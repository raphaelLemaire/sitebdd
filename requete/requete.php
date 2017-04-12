<table style = "border-collapse: collapse;">
	<caption>Stocks</caption>
		<tr COLSPAN=2 BGCOLOR = "lightgray" style="text-align:center;border: 1px solid black">
			<td class = "col-sm-1">#</td>
			<td class = "col-sm-1">ID Entrepot</td>
			<td class = "col-sm-1">Quantité</td>
			<td class = "col-sm-1">Modifier</td>
			<td class = "col-sm-1">Supprimer</td>


		</tr>
		<?php
			include 'connexion.php';
			foreach  ($pdo->query('SELECT * FROM ecommerce.stock;') as $row) {     
            echo "<tr style = 'border: 1px solid black'>" .
                "<td style = 'text-align:center;border: 1px solid black'>" . $row["produitId"] . "</td>" .
                "<td style = 'text-align:center;border: 1px solid black'>" . $row["entrepotId"] . "</td>" .
                "<td style = 'text-align:center;border: 1px solid black'>" . $row["quantite"] . "</td>" .
                "<td style = 'text-align:center;border: 1px solid black'><a href = '#'>Change</td>".
                "<td style = 'text-align:center;border: 1px solid black'><a href = '#'>Delete</td>".
                "</tr>";
            }
    	?>