function detailBuku(book_id, lelang){
	reviewBuku(book_id, lelang);
	$.ajax({
		url: "https://mighty-bayou-87376.herokuapp.com/src/php/ajax.php",
		datatype: "html",
		data: { book_id : book_id, command : "detail" },
		method: "POST"
	}).done(function(obj){
		var temp = JSON.parse(obj);
		$("#displayBuku").html("<td><img id='fotoBuku' src='"+ temp[1] + "'></td>");
		$("#judulBuku").html(temp[2]);
		$("#deskripsiBuku").html(temp[5]);
		$("#detailBuku").html("<td id='book_id'>"+ temp[0] + "</td>" + "<td>"+ temp[3] + "</td>" + "<td>"+ temp[4] + "</td>");
		
		if (temp[6] <= 0){
			$("#detailBuku").html($("#detailBuku").html() + "<td>"+ '<p class="list-group-item-text" style="color:red;">Stok Kosong.</p>' + "</td>");
		}else {
			$("#detailBuku").html($("#detailBuku").html() + "<td>"+ temp[6] + "</td>");
		}
		
		$("#detailPinjam").html($("#tombolPinjam" + book_id).html());
	});
}
function reviewBuku(book_id, lelang){
	$.ajax({
		url: "https://mighty-bayou-87376.herokuapp.com/src/php/ajax.php",
		datatype: "html",
		data: { book_id : book_id, command : "review" , auction: lelang},
		method: "POST"
	}).done(function(obj){
		var temp = JSON.parse(obj);
		$("#reviewBuku").html("");
		$("#detailReview").html("");
		for (var i = 0; i < temp.length; i++){
			$("#reviewBuku").html($("#reviewBuku").html() + (i+1) + ".	" + temp[i][4] + "<br>");
			var tmp = "";
			for (var j = 0; j < temp[i].length; j++){
				if (j !== 4){
					tmp = tmp + "<td>" + temp[i][j] + "</td>";
				}
			}
			
			$("#detailReview").html($("#detailReview").html() +"<tr>"+ tmp +"</tr>");	
		}
	}); 
}
function komenBuku(user_id, lelang){
	var idBuku = $("#book_id").html();
	var isi = $("#update-reviewBuku").val();
	$.ajax({
		url: "https://mighty-bayou-87376.herokuapp.com/src/php/ajax.php",
		datatype: "html",
		data: { book_id : idBuku, user_id : user_id, content : isi, command : "komentar", auction: lelang},
		method: "POST"
	}).done(function(obj){
		reviewBuku(idBuku, lelang);
	});
}

function editBuku(book_id){
	$.ajax({
		url: "https://mighty-bayou-87376.herokuapp.com/src/php/ajax.php",
		datatype: "html",
		data: { book_id : book_id, command : "detail" },
		method: "POST"
	}).done(function(obj){
		var temp = JSON.parse(obj);
		$("#update-displayBuku").value = temp[1];
		$("#update-judulBuku").value = temp[2];
		$("#update-pengarangBuku").value = temp[3];
		$("#update-penerbitBuku").value = temp[4];
		$("#update-deskripsiBuku").value = temp[5];
		$("#update-stokBuku").value = temp[6];

		// var idBuku = $("#book_id").html();
		// var display = $("#update-displayBuku").val();
		// var judul = $("#update-judulBuku").val();
		// var pengarang = $("#update-pengarangBuku").val();
		// var penerbit = $("#update-penerbitBuku").val();
		// var deskripsi = $("#update-deskripsiBuku").val();
		// var stok = $("#update-stokBuku").val();
		// $.ajax({
		// 	url: "https://mighty-bayou-87376.herokuapp.com/src/php/ajax.php",
		// 	datatype: "html",
		// 	data: { book_id : book_id, displayBuku : display, judulBuku : judul, pengarangBuku: pengarang, penerbitBuku: penerbit, deskripsiBuku : deskripsi, stokBuku : stok, command : "update" },
		// 	method: "POST"
		// }).done(function(obj){
		// 	alert('Update success');
		// 	window.location = './daftar.php';
		// });
	});
}