<?php
# Initialization
include("LIB_http.php");
include("LIB_parse.php");
$product_array=array();
$product_count=0;

# Download the target (store) web page
$target = "http://www.tellmewhenitchanges.com/buyair";
$web_page = http_get($target, "");

# Parse all the tables on the web page into an array
$table_array = parse_array($web_page['FILE'], "<table", "</table>");

# Look for the table that contains the product information
for($xx=0; $xx<count($table_array); $xx++)
{
	$table_landmark = "Products For Sale";
	if(stristr($table_array[$xx], $table_landmark)) 
	// Process this table, 如果陣列裡面有符合 table_landmark的字串
	{
		echo "FOUND: Product table\n";  //找到produce的table

		# Parse table into an array of table rows, 再將這個table的內容分析， <tr , </tr>中間的參數
		$product_row_array = parse_array($table_array[$xx], "<tr", "</tr>");

		for($table_row=0; $table_row<count($product_row_array); $table_row++)
		{
			# Detect the beginning of the desired data (Heading row)
			#當找到參數是在<tr , "</tr>"裡面的話
			$heading_landmark = "Condition";
			if((stristr($product_row_array[$table_row], $heading_landmark))) 
			//如果找到的參數內容符合 heading landmark的參數的話
			{
				echo "FOUND: Table heading row\n"; //顯示找到 Table heading row

				# Get the postistion of the desired headings
				$table_cell_array = parse_array($product_row_array[$table_row], "<td", "</td>"); 
				//再用<td , </td>做為filter的參數 ，尋找下一個參數
				for($heading_cell=0; $heading_cell<count($table_cell_array); $heading_cell++)
				{
					if(stristr(strip_tags(trim($table_cell_array[$heading_cell])), "ID#")) 
					//strip_tags把html標籤拿掉，但是保留ID#
					//這邊的trim用來清除空白
						//$id_column是找到的id, id是被過濾過的id
						$id_column=$heading_cell;
					if(stristr(strip_tags(trim($table_cell_array[$heading_cell])), "Product Name"))
					//strip_tags把html標籤拿掉，但是保留Product Name#
					//這邊的trim用來清除空白
						//$name_column是找到的Product Name, Product Name是被過濾過的Product Name
						$name_column=$heading_cell;
					
					if(stristr(strip_tags(trim($table_cell_array[$heading_cell])), "Price"))
					//strip_tags把html標籤拿掉，但是保留Price#
					//這邊的trim用來清除空白
						//$price_column是找到的Price, Price是被過濾過的Price
						$price_column=$heading_cell;
				}
				echo "FOUND: id_column=$id_column\n";
				echo "FOUND: price_column=$price_column\n";
				echo "FOUND: name_column=$name_column\n";

				# Save the heading row for later use
				$heading_row = $table_row;
			}

			# Detect the end of the desired data
			$ending_landmark = "Calculate";
			if((stristr($product_row_array[$table_row], $ending_landmark)))
			//如果找到的參數內容符合 $ending_landmark的參數的話
			{
				echo "PARSING COMPLETE!\n";
				break;
			}

			# Parse product & price data
			if(isset($heading_row) && $heading_row<$table_row)
			//&& <- and, isset <-確認裡面是否有參數
			{
				//將得到的ID, NAME and PRICE存到product_array陣列裡面
				$table_cell_array = parse_array($product_row_array[$table_row], "<td", "</td>");
				$product_array[$product_count]['ID'] = strip_tags(trim($table_cell_array[$id_column]));
				$product_array[$product_count]['NAME'] = strip_tags(trim($table_cell_array[$name_column]));
				$product_array[$product_count]['PRICE'] = strip_tags(trim($table_cell_array[$price_column]));
				$product_count++;
				echo"PROCESSED: Item #$product_count\n";
			}
		}
	}
}
# Display the collected data
for($xx=0; $xx<count($product_array); $xx++)
{
	echo "$xx. ";
	echo "ID: ".$product_array[$xx]['ID'].", ";
	echo "NAME: ".$product_array[$xx]['NAME'].", ";
	echo "PRICE: ".$product_array[$xx]['PRICE']."\n";
}