

</div> <!-- FIN DEL WRAPPER QUE EMPIEZA EN NAV.PHP -->


<script>
	$('#menu-toggle').on('click', function(e) {
	    e.preventDefault();
	    $('#wrapper').toggleClass('toggled');
	});




  function ConfirmAlert(id_delete, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea eliminar éste registro?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id_delete;
          },
          cancel: function(){
            return;
          }
      });
  }


  function SendEmail(id_delete, Url){
      $.confirm({
          title: 'Enviar Correo!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Enviar correo para avisar por el pedido pendiente?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id_delete;
          },
          cancel: function(){
            return;
          }
      });
  }


  $(document).ready(function(){
      $('.table').DataTable({
        order: [[0, "desc"]],
      });

      $(window).resize(function(){
            var ancho_ventana = $(window).width();
            if(ancho_ventana > 995){
              $('#wrapper').removeClass('toggled');
            }
      });

  });



  function entregado(id, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea marcar como ENTREGADO este pedido?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id;
          },
          cancel: function(){
            return;
          }
      });
  }


  function confirmar(id, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea marcar con PAGADO este pedido?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id;
          },
          cancel: function(){
            return;
          }
      });
  }



  function cancelar(id, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea marcar como CANCELADO este pedido?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id;
          },
          cancel: function(){
            return;
          }
      });
  }



  function activar(id, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea ACTIVAR este registro?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id;
          },
          cancel: function(){
            return;
          }
      });
  }



  function desactivar(id, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea DESACTIVAR este registro?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id;
          },
          cancel: function(){
            return;
          }
      });
  }




  function destacar(id, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea DESTACAR este registro?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id;
          },
          cancel: function(){
            return;
          }
      });
  }



  function no_destacar(id, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea NO DESTACAR este registro?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id;
          },
          cancel: function(){
            return;
          }
      });
  }


  function pdf(fecha, Url){
      window.open(Url + '/' + fecha, '_blank');
  }


  function enviarFactura(id_factura, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea enviar esta factura?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '/' + id_factura;
          },
          cancel: function(){
            return;
          }
      });
  }


  function enviarFacturas(id_factura, Url){
      $.confirm({
          title: 'Alerta!',
          confirmButton: 'Si',
          cancelButton: 'NO',
          confirmButtonClass: 'btn btn-info',
          cancelButtonClass: 'btn btn-danger',
          dialogClass: "modal-dialog modal-lg",
          content: 'Esta seguro que desea enviar las facturas seleccionadas?',
          icon: 'fa fa-warning',
          confirm: function(){
            window.location = Url + '?ids=' + id_factura;
          },
          cancel: function(){
            return;
          }
      });
  }



</script>

</body>
</html>