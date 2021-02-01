<center>
	<div class="listTab">
		<h3>LISTE MAINTENANCE</h3>

		<form>
			<input type="text" name="search" placeholder="Recherche" id="search">
		</form>
		<center>
			<div class="boite">
				<table class="tab" id="rrr">
					<thead>
						<tr>
							<th class="titre">ID</th>
							<th class="titre">Id Materiel </th>
							<th class="titre">Numero Panne</th>
							<th class="titre">Numero Piece</th>
							<th class="titre">Depanneur</th>
							<th class="titre">Type</th>
							<th class="titre">Etat</th>
							<th class="titre">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include("../include/connexion.php");

							$reponse=$bdd->query('SELECT maintenance.idMain, admin.NomAdmin, maintenance.IdMateriel, maintenance.NumPanne, maintenance.NumPiece, maintenance.Type, maintenance.Etat from maintenance, admin WHERE admin.NumMatAdmin = maintenance.NumMatAdmin ');

							while ($donnees=$reponse->fetch()) {

						?>
						<tr>
							<td align="center"><?php echo $donnees['idMain']; ?></td>
							<td align="center"><?php echo $donnees['IdMateriel']; ?></td>

							<td align="center"><?php echo $donnees['NumPanne']; ?></td>

							<td align="center"><?php echo $donnees['NumPiece']; ?></td>

							<td align="center"><?php echo $donnees['NomAdmin']; ?></td>

							<td align="center"><?php echo $donnees['Type']; ?></td>

							<td align="center"><?php echo $donnees['Etat']; ?></td>

							<td align="center"><a class="boutonModif" onclick="update_data('<?php echo $donnees['idMain'];?>','<?php echo $donnees['NumPanne'];?>','<?php echo $donnees['NumPiece'];?>','<?php echo $donnees['IdMateriel'];?>','<?php echo $donnees['Type'];?>','<?php echo $donnees['Etat']; ?>')" ></a>


								<a class="boutonSupp" onclick="delete_data('<?php echo $donnees['idMain'];?>')"></a></td>
						</tr>
							<?php
								}
								$reponse->closeCursor();
							?>

					</tbody>

				</table>
			</div>
		</center>
	</div>
</center>

<script type="text/javascript">
	
function update_data(nummain_param, numpanne_param, numpiece_param, idmat_param, type_param, etat_param)
{

document.getElementById('numPanne').value = numpanne_param;
document.getElementById('numPiece').value = numpiece_param;
document.getElementById('IdMat').value = idmat_param;
document.getElementById('type').value = type_param;
document.getElementById('etat').value = etat_param;
document.getElementById('nummain').value= nummain_param;
document.getElementById('envoyer').value= "Valider";

}


function delete_data(nummain_param)
{
	//document.getElementById('numero_piece').value = num_piece_param;
	$.ajax
        ({
           type: "GET",
           url: "SuppMaintenance.php",
           data: 'idmain='+nummain_param,
          

           success: function(resultat)
           {
            
           $("table#rrr").html(resultat); 
           $('form#blocformulaire')[0].reset();
            
           }
           ,
          error: function()
          {
            
            alert('error');
          }
        });

}	
</script>