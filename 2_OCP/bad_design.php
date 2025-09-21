<?php
/*
 * A ReportGenerator class that generates reports in PDF & CSV formats.
 *
 * The problem here is the ReportGenerator class is not closed for modification.
 * If we wants to add functionality to generate reports in XML or JSON format,
 * we have to modify the generateReport method by adding another elseif block.
 * This makes the code fragile and difficult to maintain.
 *
 */
class ReportGenerator
{
    public function generateReport(string $format)
    {
        $format = strtolower($format);

        if( $format === 'pdf'){

            // Simulate the logic to generate PDF repord
            echo 'Generating PDF report...' . PHP_EOL ;

        }elseif($format === 'csv'){

            // Simulate the logic to generate CSV report
            echo 'Generating CSV report...' . PHP_EOL;

        }else {
            throw new \Exception('Unsupported format ' . $format);
        }
    }
}

// Usages
try {

    $reportgenerator = new ReportGenerator();

    $reportgenerator->generateReport(format: 'pdf');
    $reportgenerator->generateReport(format: 'CSV');
    $reportgenerator->generateReport(format: 'json');

} catch (\Throwable $e) {

    print $e->getMessage() . PHP_EOL;
}

