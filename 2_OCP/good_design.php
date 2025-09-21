<?php
/*
 * To apply OCP, we'll introduce an interface that defines a contract
 * for all report generators. This makes our code open for extension
 * and close for modification.
 */

// 1. Define an interface (the abstraction)
interface ReportFormatter
{
    public function formatter() : string;
}

// 2. Create concrete classes that implement the interface
class PdfFromatter implements ReportFormatter
{
    public function formatter() : string
    {
        // Simulate the logic to generate PDF repord
        return 'Generating PDF report...' . PHP_EOL;
    }
}

// CSV formatter
class CsvFromatter implements ReportFormatter
{
    public function formatter() : string
    {
        // Simulate the logic to generate CSV repord
        return 'Generating CSV report...' . PHP_EOL;
    }
}

// 3. The ReportGenerator class is now closed for modification
class ReportGenerator
{
    // function injection
    public function generateReport(ReportFormatter $formatter)
    {
        echo $formatter->formatter();
    }
}

// 4. Usages
try {
    $pdformatter = new PdfFromatter();
    $csvformatter = new CsvFromatter();

    $reportgenerator = new ReportGenerator();

    // function injection -  the pdf formetter
    $reportgenerator->generateReport(formatter: $pdformatter);

     // function injection -  csv formetter
    $reportgenerator->generateReport(formatter: $csvformatter);

}  catch (\Throwable $e) {

    print $e->getMessage() . PHP_EOL;
}



// 5. To add a new format, we just extend the functionality without modifying existing code
class XmlFormatter implements ReportFormatter
{
    public function formatter() : string
    {
        // Simulate the logic to generate XML repord
        return 'Generating XML report...' . PHP_EOL;
    }

}

// And just use this new added format
$xmlformatter = new XmlFormatter();
$reportgenerator->generateReport(formatter: $xmlformatter);


