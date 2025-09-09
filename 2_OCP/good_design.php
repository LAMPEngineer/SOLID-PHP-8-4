<?php
/* 
 * To apply OCP, we'll introduce an interface that defines a contract for all report generators. 
 * This makes our code open for extension and close for modification.
 */

// 1. Define an interface (the abstraction)
interface ReportFormatter
{
    public function format();
}

// 2. Create concrete classes that implement the interface
class PdfFromatter implements ReportFormatter
{
    public function format()
    {
        return "Generating PDF report...\n";
    }
}

// CSV formatter 
class CsvFromatter implements ReportFormatter
{
    public function format()
    {
        return "Generating CSV report...\n";
    }
}

// 3. The ReportGenerator class is now closed for modification
class ReportGenerator
{
    public function generateReport(ReportFormatter $formatter)
    {
        echo $formatter->format();
    }
}

// 4. usages
$pdformatter = new PdfFromatter();

$csvformatter = new CsvFromatter();

$reportgenerator = new ReportGenerator();

$reportgenerator->generateReport(formatter: $pdformatter); // inject the dependency, the pdf formetter

$reportgenerator->generateReport(formatter: $csvformatter); // inject the dependency, the csv formetter


// 5. To add a new format, we just extend the functionality without modifying existing code
class XmlFormatter implements ReportFormatter
{
    public function format()
    {
        return "Generating XML report...\n";
    }

}


$xmlformatter = new XmlFormatter();
$reportgenerator->generateReport(formatter: $xmlformatter); // inject the dependency, the xml formetter

