<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$databaseName = "admin";
$port = 3306;

?>

<!DOCTYPE html>
<html>
<head>
    <h1> The Paper Bag. </h1>
    <h3> List of Products </h3>
</head>
<style>
    head, h1, h3 {
        font-family: monospace;
    }
    table {
        font-family: monospace;
        border: 2px solid #d3a35d;
        border-collapse: collapse;
        width: 100;
    }
    td {
        border: 2px solid #d3a35d;
        text-align: center;
        padding: 8px;
        
    }
    th {
        font-weight: bold;
        border: 2px solid #d3a35d;
        text-align: center;
        padding: 8px;
    }
</style>

<body style = "background-color: #ffedc0">
    
    <table> 
        <tr>
            <th> Categories </th>
            <th> Products </th>
            <th> Variations </th>
            <th> Price </th>
        </tr>
        <tr>
            <td> Papers </td>
            <td style = "text-align: left"> 
                 1. Water color paper <br> 
                 2. Bond Paper <br>
                 3. Vellum Paper <br>
                 4. Cartolina <br>
                 5. Paper Pad  </td>
            <td> 10 pcs. or 20 pcs. <br>
                 10 pcs. or 20 pcs. <br>
                 10 pcs. or 20 pcs. <br>
                 10 pcs. or 20 pcs. <br>
                 1 pad or 2 pads
            </td>
            <td> PHP 55.00 to PHP 110.00 <br>
                 PHP 55.00 to PHP 110.00  <br>
                 PHP 55.00 to PHP 110.00  <br> 
                 PHP 55.00 to PHP 110.00  <br>
                 PHP 55.00 to PHP 110.00
                </td>
        </tr>
        <tr>
            <td> Pencils</td>
            <td style = "text-align: left"> 
                 1. Mongol Pencils <br> 
                 2. Faber Castell Pencils <br>
                 3. Mechanical Pencils <br>
                </td>
            <td> Size </td>
            <td> PHP 00.00 <br> 
                 PHP 00.00  <br>
                 PHP 00.00  
                </td>
        </tr>
        <tr>
            <td> Ballpen </td>
            <td style = "text-align: left"> 
                 1. Panda Ballpen <br> 
                 2. G Tech Pen <br>
                 3. HBW <br>
                 4. Faber Castell Pen <br>
                 5. Friction Pen  </td>
            <td> Size </td>
            <td> PHP 00.00 <br>
                 PHP 00.00  <br>
                 PHP 00.00  <br> 
                 PHP 00.00  <br>
                 PHP 00.00  
                </td>
        </tr>
        <tr>
            <td> Markers </td>
            <td style = "text-align: left"> 
                 1. Permanent Markers <br> 
                 2. Whiteboard Markers <br>
                 3. Highlighters <br>
                </td>
            <td> Size </td>
            <td> PHP 00.00 <br> 
                 PHP 00.00  <br>
                 PHP 00.00  
                </td>
        </tr>
        <tr>
            <td> Arts & Crafts </td>
            <td style = "text-align: left"> 
                 1. Washi Tapes <br> 
                 2. Glue <br>
                 3. Paste <br>
                 4. Scissors <br>
                 5. Coloring Materials </td>
            <td> Size </td>
            <td> PHP 00.00 <br>
                 PHP 00.00  <br>
                 PHP 00.00  <br> 
                 PHP 00.00  <br>
                 PHP 00.00  
                </td>
        </tr>
        <tr>
            <td> Erasers </td>
            <td style = "text-align: left"> 
                 1. Liquid Eraser <br> 
                 2. Correction Tape <br>
                 3. Pencil Eraser <br>
                 4. Kneadable Eraser <br>
                 5. 2 Sided Eraser </td>
            <td> Size </td>
            <td> PHP 00.00 <br>
                 PHP 00.00  <br>
                 PHP 00.00  <br> 
                 PHP 00.00  <br>
                 PHP 00.00  
                </td>
        </tr>
        <tr>
            <td> Notebooks </td>
            <td style = "text-align: left"> 
                 1. Plain Blank <br> 
                 2. Grid <br>
                 3. Dotted <br>
                 4. Lined <br>
                 5. Composition Notebook  </td>
            <td> Size </td>
            <td> PHP 00.00 <br>
                 PHP 00.00  <br>
                 PHP 00.00  <br> 
                 PHP 00.00  <br>
                 PHP 00.00  
                </td>
        </tr>
        <tr>
            <td> Journals </td>
            <td style = "text-align: left"> 
                 1. Softbound <br> 
                 2. Hard Bound 
            <td> Size </td>
            <td> PHP 00.00 <br>
                 PHP 00.00  
                </td>
        </tr>
        <tr>
            <td> Office Supplies</td>
            <td style = "text-align: left"> 
                 1. Envelopes <br> 
                 2. Folder <br>
                 3. Stapler <br>
                 4. Clipd <br>
                 5. Calculator </td>
            <td> Size </td>
            <td> PHP 00.00 <br>
                 PHP 00.00  <br>
                 PHP 00.00  <br> 
                 PHP 00.00  <br>
                 PHP 00.00  
                </td>
        </tr>
    </table>
    
</body>

</html>
