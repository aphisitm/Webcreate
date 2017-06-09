Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

  el: '#mycampaign',

  data: {
    items: [],
    pagination: {
        total: 0, 
        per_page: 2,
        from: 1, 
        to: 0,
        current_page: 1
      },
    offset: 4,
    formErrors:{},
    formErrorsUpdate:{},

    newItem : {'title':'','detail':'','product_url':'','minprice':'','maxprice':'','productimg':'','deadline':''},
    fillItem : {'title':'','detail':'','product_url':'','minprice':'','maxprice':'','productimg':'','deadline':'','campaigns_id':'',}
  },

  computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

  ready : function(){
      this.getVueItems(this.pagination.current_page);
  },

  methods : {

        getVueItems: function(page){
          this.$http.get('/brand/campaignitems?page='+page).then((response) => {
            this.$set('items', response.data.data.data);
            this.$set('pagination', response.data.pagination);
          });
        },

        createItem: function(){
      var input = this.newItem;
      this.$http.post('/brand/campaignitems',input).then((response) => {
      this.changePage(this.pagination.current_page);
      this.newItem = {'title':'','detail':'','product_url':'','minprice':'','maxprice':'','productimg':'','deadline':''};
      $("#create-item").modal('hide');
      toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
      }, (response) => {
      this.formErrorsUpdaterrors = response.data;
      });
  },

      deleteItem: function(item){
        this.$http.delete('/brand/campaignitems/'+item.campaigns_id).then((response) => {
            this.changePage(this.pagination.current_page);
            toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
      },

      editItem: function(item){
          this.fillItem.campaigns_id = item.campaigns_id;
          this.fillItem.title = item.title;         
          this.fillItem.detail = item.detail;
          this.fillItem.product_url = item.product_url;
          this.fillItem.minprice = item.minprice;
          this.fillItem.maxprice = item.maxprice;
          this.fillItem.productimg = item.productimg;
          this.fillItem.deadline = item.deadline;
          
          
          $("#edit-item").modal('show');
      },

      updateItem: function(id){
        var input = this.fillItem;
        this.$http.put('/brand/campaignitems/'+id,input).then((response) => {
            this.changePage(this.pagination.current_page);
            this.fillItem = {'campaigns_id':'','title':'','detail':'','product_url':'','minprice':'','maxprice':'','productimg':'','deadline':''};
            $("#edit-item").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
          }, (response) => {
              this.formErrorsUpdate = response.data;
          });
      },

      changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueItems(page);
      }

  }

});