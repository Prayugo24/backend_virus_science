
// untuk pop upnya
  function edit_cat(kd_kategori){
    // untuk menampung isi data dari kdkar
    var datam={"kd_kate":kd_kategori};
    var base_url2='http://localhost/inventory/index.php/home/';


    // ajax
    jQuery.ajax({
      // url untuk menuju data yang akan di kirim
      // url: "http://localhost/inventory/index.php/home/edit_category",
      url: base_url2+"edit_category",
      method : "POST",
      data:datam,
      success:function(data){

        jQuery('body').append(data);
        // untuk menampilkan modal berdasarkan edit
        jQuery('#edit-category').modal('toggle');
        // untuk menghilangkan isi post agar kembali menjadi 0 pada variabel datam
        jQuery('#edit-category').remove();
 

      },
      error:function(){
          alert("something went wrong"+datam).console.error();

      }

    });
  }
  function closeModal(){
    // untuk merefresh halaman
     window.location.reload();

  }

  // function Swall_Delete(kd_kar){
  // //  var kd_kary=kd_kar;
  //   // alert('error hapus'+kd_kary);
  //   var base_url2='/website/kp/codeigneter/index.php/Admin/crud/';
  // swal({
  //   title: "Anda Yakin?",
  //   text: "Data Yang Sudah Terhapus Tidak Bisa Dikembalikan Lagi!",
  //   icon: "warning",
  //   buttons: true,
  //   dangerMode: true,

  // })
  // .then((willDelete) => {
  //   if (willDelete) {
  //       $.ajax({
  //         url:base_url2+"hapus_pegawai",
  //         type:"POST",
  //         data:{'kd_kary':kd_kar},

  //         success:function(){
  //           swal("Terhapus!", "Data Berhasil Dihapus.", {
  //             icon: "success",
  //           });
  //           window.location.reload();
  //         },
  //         error:function(){
  //           alert('error hapus');
  //         }

  //       });

  //   } else {
  //     swal("Cancelled", "Data Tidak Jadi Dihapus");
  //   }
  // });
  // }
