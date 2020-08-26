<?php

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Validator\Constraints\DateTime;

use App\Entity\Fullfidesio;
use App\Entity\Correspondance;
use App\Entity\ModeTransport;
use App\Entity\Station;
use App\Entity\Terminus;

class ImportDataCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        // The name and description for the command in app/command
        $this->setName('import:csv')
            ->setDescription('Import data from CSV file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Showing when the script is launched
        $now = new \DateTime();
        $output->writeln('<comment>Start : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');

        // Importing CSV on DB via Doctrine ORM
        $Fullfidesio = new Fullfidesio();
        $this->importFile($input, $output, 'public/data/exports-des-gares-idf.csv', $Fullfidesio);



        // Showing when the script is over
        $now = new \DateTime();
        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    }

    protected function importFile(InputInterface $input, OutputInterface $output, $filename, $obj)
    {
        // Getting doctrine manager
        $em = $this->getContainer()->get('doctrine')->getManager();
        // Turning off doctrine default logs queries for saving memory (for big files)
        $em->getConnection()->getConfiguration()->setSQLLogger(null);
        // Getting php array of data from CSV
        $dataArray = $this->convert($filename);

        // Define the size of record, the frequency for persisting the data and the current index of records
        $size = count($dataArray);
        $batchSize = 1000;
        $i = 1;

        // Starting progress
        $progress = new ProgressBar($output, $size);
        $progress->start();

        // Processing on each row of data
        foreach ($dataArray as $row) {
            $this->setData($row, $obj);
            // Each 1000 entries persisted we flush everything
            if (($i % $batchSize) === 0) {
                $em->flush();
                // Detaches all entries from Doctrine for memory save
                $em->clear();
            }
            $i++;
        }

        // Flushing and clear data on queue
        $em->flush();
        $em->clear();

        // Ending the progress bar process
        $now = new \DateTime();
        $progress->advance($size);
        $output->writeln($now->format('d-m-Y G:i:s'));
        $progress->finish();
    }

    public function setData($row, $obj)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        if ($obj instanceof Fullfidesio) {

            // Check the existance of the transport
            // In the script we suppose that we are only working on Metro station
            $transport = $em->getRepository(ModeTransport::class)
                ->findOneBy(
                    [
                        'typeTransport' => 'Metro',
                        'ligne' => $row['ligne']
                    ]
                );

            if (!$transport) {
                $transport = new ModeTransport();
                $transport->setTypeTransport('Metro')
                    ->setLigne($row['ligne']);
                $em->persist($transport);
            }

            //Check the existance of the station
            $station = $em->getRepository(Station::class)
                ->findOneBy(
                    ['garesid' => $row['gares_id']]
                );

            if (!$station) {
                $station = new station();
                $station->setNomGare($row['nom_gare']);
                $station->setNomlong($row['nomlong']);
                $station->setNomIv($row['nom_iv']);
                $station->setGaresid($row['gares_id']);
                $station->addModeTransport($transport);
                // Turning off doctrine default logs queries for saving memory (for big files)
                $em->getConnection()->getConfiguration()->setSQLLogger(null);

                $em->persist($station);

                //Add Terminus 
                if ($row['ter' . strtolower($row['mode_'])] != '0') {
                    $TerminusObject = new Terminus();
                    $TerminusObject->addStation($station);
                    $TerminusObject->addModeTransport($transport);

                    $em->persist($TerminusObject);
                }

                //Add correspondance
                $correspondance = new Correspondance();
                $correspondance->setModeTransport($transport);
                $correspondance->setStation($station);
                $em->persist($correspondance);
            }
        }
    }


    public function convert($filename, $delimiter = ';')
    {
        // Check if the file exist and is readable
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        // Initialize arrays
        $header = NULL;
        $data = array();

        // Parse the csv file
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {

                // Get the 1st line to set the names for each field
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }

            // Close the file
            fclose($handle);
        }
        return $data;
    }
}
