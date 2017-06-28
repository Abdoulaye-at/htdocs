$(function(){


	/************************* Exercice 1 *************************/
	/**
		Créé un carrousel d'image qui affiche une image toutes les trois secondes
	**/

	let index = 0; // L'index permettra de parcourir le tableau d'image

	setInterval(function(){ // Permet d'effectuer une fonction toute les x seconde

		let image = [
			"http://www.baskettiamo.com/baskettiamo/wp-content/uploads/2014/01/sfondo-prova21-e1399624024267.jpg",
		"http://www.gokyuzu.com.tr/file/2017/03/basket-basari-bnr.jpg",
		"http://s1.narvii.com/image/wmyzke2u5qawrkh6ddomku6saaafdk2b_hq.jpg"]; // Varible qui stocke nos images

		if(index == image.length) // Condition pour revenir à la premiere image
			index = 0;

		$("#slider-Mike").attr("src", image[index]); // Modifier la source de l'image

		index++;


	}, 3000);

	/************************* Exercice 2 *************************/

	$(".one_third").one("click", function(){	// Function se declanche au click sur l'id imagesMike1 une seul fois
		$("#imagesMike1").attr("src", "http://www.ilmostardino.it/wp-content/uploads/2017/06/EnriqueRamosGergati2-290x180.jpg"); // Modifier la source de l'image
		$("#imagesMike2").attr("src", "http://www.ilmostardino.it/wp-content/uploads/2016/04/EnriqueRamosDiBella5-290x180.jpg"); // Modifier la source de l'image
		$("#imagesMike3").attr("src", "https://www.westpointaog.org/image/CDT-Tanner-Plomb-16-4.jpg"); // Modifier la source de l'image
	});


	/************************* Exercice 3 *************************/
	$(".one_third").click(function(){ // Function se declanche au click sur la class one_third
		let image = $("#imagesMike1").attr("src"); // Je stock la valeur src de la premiere image dans la variable image
		$("#imagesMike1").attr("src", $("#imagesMike3").attr("src")); // Je modifie le src de la premiere image par le src de la troisieme
		$("#imagesMike3").attr("src", $("#imagesMike2").attr("src")); // Je modifie le src de la troisieme image par le src de la deuxieme
		$("#imagesMike2").attr("src", image);// Je modifie le src de la deuxieme image par le src stoker dans la variable image
	});

	/************************* Liste des utilisateurs *************************/
	var request = $.ajax({ // Envoi d'un request sur une url avec une methode - DEMANDE
		url: "https://jsonplaceholder.typicode.com/users",
		method: "GET",
		dataType: "json" // optionnel - Defini le type de donnée recu par le serveur
	});

	request.done(function( users ) { // done = success - Code à effectuer en cas de reussite - REPONSE EN CAS DE REUSSITE (users = reponse du serveur)
			var content ="";
	  	console.log( users );
			for(var i = 0; i < users.length;i++){
				content += '<li><a href="#" mike="'+users[i].id+'">'+users[i].name+'</a></li>'
			}
			$("#right_column ul").html(content); // Evenement du DOM - Modification de l'HTML dans la balise ul qui se trouve dans la balise qui a l'id right_column - content contient le codze html
			listenClick();
	});

	request.fail(function( jqXHR, textStatus ) {  // fail = echec - Code à effectuer en cas d'echec - REPONSE EN CAS D'ECHEC
	  alert( "Request failed: " + textStatus );
	});

	console.log( "Mike" );

	function listenClick(){
		$("#right_column a").click(function(e){
			e.preventDefault();
			var request = $.ajax({
				url: "https://jsonplaceholder.typicode.com/users",
				method: "GET",
				dataType: "json",
				data: {id: $(this).attr("mike")}
			})

			.done(function(user){
				console.log(user);
				$("#name").val(user[0].name)
				$("#website").val(user[0].website)
				$("#phone").val(user[0].phone)
			})
		})
	}

	$("form").submit(function(e){
		e.preventDefault();
		console.log($(this).serialize())
		$.post({
			url: "http://localhost/Ajax/Basic/php/add_users.php",
			dataType: "json",
			data:$(this).serialize(), // la fonction serialize recupere le contenu des input
		})
		.done(function(data){
			console.log(data);
			alert('User ajouté !');
			$("#name").val("")
			$("#website").val("")
			$("#phone").val("")
		})
	})






});
