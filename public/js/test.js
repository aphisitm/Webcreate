new Vue({

  el: '#mycampaign',
  

  methods : {       

      updateItem: function(id){
        var input = this.fillItem;
        this.$http.put('/brand/profile/'+id,input).then((response) => {
            this.changePage(this.pagination.current_page);
            this.fillItem = {'campaigns_id':'','title':'','detail':'','product_url':'','minprice':'','maxprice':'','productimg':'','deadline':''};
            $("#edit-item").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
          }, (response) => {
              this.formErrorsUpdate = response.data;
          });
      },      

  }

});