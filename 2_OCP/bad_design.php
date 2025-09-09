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

            // Logic to generate PDF repord
            echo "Generating PDF report...\n";

        }elseif($format === 'csv'){

            // Logic to generate CSV report
            echo "Generating CSV report...\n";

        }else {
            throw new Exception("Unsupported format " . $format);
        }
    }
}

// Usages
$reportgenerator = new ReportGenerator();
$reportgenerator->generateReport(format: 'pdf');
$reportgenerator->generateReport(format: 'CSV');
$reportgenerator->generateReport(format: 'json');