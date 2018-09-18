<?php
	$total_rows =  $c_Article->C_countArticles();
	
	$records_per_page = 6;
	$from_record_num = ($records_per_page * $page) - $records_per_page;
	$stmt = $c_Article->C_get_Articles($from_record_num,$records_per_page);

	echo "<div class='right-button-margin'>";
	echo "<a href='index.php?q=create_article' class='btn btn-default pull-right'>Create Product</a>";
	echo "</div>";

	
	echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>TieuDe</th>";
            echo "<th>TomTat</th>";
            echo "<th>Noidung</th>";
            echo "<th>Actions</th>";
        echo "</tr>";


	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		 echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$TieuDe}</td>";
                echo "<td>{$TomTat}</td>"; 
                echo "<td>{$NoiDung}</td>";
                echo "<td>";
                    // read product button
                    echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Read";
                    echo "</a>";
                     
                    // edit product button
                    echo "<a href='update_product.php?id={$id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</a>";
                     
                    // delete product button
                    echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</a>";
                echo "</td>";
 
            echo "</tr>";
	}
		echo "</table>";
		include_once"paging.php";
  ?>