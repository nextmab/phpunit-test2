#!/archive/data1/bin/php -f
<?php
#
# standalone PHP program 
# (edit top line to point to local PHP executable)
#
# Submits GET request to search HST archive for given RA, Dec, and radius,
# limit results to 10 records, 
# returns data set name, RA, Dec, and Target name
# as a comma-separated list
# prints out column headings and data
#

# create GET request

$request = "http://archive.stsci.edu/hst/search.php?";      //quotes url
$request .= "RA=53.084&DEC=-27.873&radius=1.0&max_records=10&";
$request .= "outputformat=CSV&action=Search"; 
$request .= "&selectedColumnsCsv=sci_data_set_name,sci_ra,sci_dec,sci_targname";

print "\nrequest = $request \n\n";

# download results from MAST as an array called $data
# (ignore errors)

$data = @file($request);

# print column headings (skip data types in next row)

print "$data[0]\n\n";

# now print search results

$cnt = count($data);
for ($i=2; $i<$cnt; $i++) print "$data[$i]\n";

?>
