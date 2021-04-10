function cekuser(a) {
    valid = /^[a-z]{1,}$/;
    return valid.test(a);
    }
function validasi(form) {
 
    var nama = document.getElementById("nama").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    
  
	var atps=email.indexOf("@");
	var dots=email.lastIndexOf(".");
   
    
    if (nama != "" && email!="" && password !="") {
        pass=/^[a-zA-Z0-9\_\-]{8,100}$/;        
        var mincar = 6; 
        if(!pass.test(form.password.value)){
            alert ('Password hasrus 8 karakter dan hanya boleh Huruf atau Angka!');
            form.password.focus();
            return false;
        };

        if (!cekuser(nama)) {
        alert("Isi Dengan Huruh Kecil");
        form.nama.focus();
        return false;
        } 
        else if(form.nama.value.length != mincar){
            alert("Panjang Username harus 6 Karater!");
            form.nama.focus();
            return (false);
        }
        else if (atps<1 || dots<atps+2 || dots+2>=rs.length) {
            alert("Alamat email harus memakai @ dan (.)");
            form.email.focus();
            return (false);
        
           
        }else {
        return true;
        };

    
    }
    

        else{
        alert ('Anda harus mengisi data dengan lengkap !');
        form.nama.focus();
        form.email.focus();
        form.password.focus();
        return false;
    };

    
  
   
}