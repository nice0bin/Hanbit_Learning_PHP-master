$fh = fopen('dishes.csv','rb');
if (! $fh) {
    die("dishes.csv ������ �� �� �����ϴ�: $php_errormsg");
}
print "<table>\n";
while ((! feof($fh)) && ($line = fgetcsv($fh))) {
    // implode()�� �����Ѵ�.
    print "<tr><td>" . implode("</td><td>", $line) . "</td></tr>\n";
}
print "</table>";