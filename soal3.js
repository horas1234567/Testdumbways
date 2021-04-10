	
		var baris, i = 0;
		var nilai_prompt = prompt("Tinggi: ", ""); 
		var tinggi=parseInt(nilai_prompt);
 
		for (baris = 0; baris <= tinggi ; baris++) {
 
		// memBuat sejumlah spasi
		for (i = 1; i <= tinggi - baris; i++) {
		document.write(" "); // Karakter spasi
		 }
 
		// menampilkan bintang
		for (i = 1; i < 2 * baris; i++) {
		document.write("*"); }
 
		// Pindah baris
		document.write("\n"); }
	
