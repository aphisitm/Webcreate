@extends('Brand.layouts.brandlayout')


@section('top')
  <meta id="token" name="token" value="{{ csrf_token() }}">
 
@endsection

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Campaign
        <small>
          <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">My Campaign</li>
          </ol>
        </small>
       
      </h1>   
        
          
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row" style="margin-left: 10px">
     <div class="container" id="mycampaign">

    <div class="row">
        <div class="col-lg-12 margin-tb">        
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
          Create Item
        </button>
        </div>
    </div>

    <!-- Item Listing -->
    <table class="table table-bordered">
      <tr>
        <th>Title</th>
        <th>Detail</th>
        <th>Product_url</th>
        <th>Minprice</th>
        <th>Maxprice</th>
        <th>Productimg</th>
        <th>Deadline</th>
        <th width="200px">Action</th>
      </tr>
      <tr v-for="item in items">

        <td>@{{ item.title }}</td>
        <td>@{{ item.detail }}</td>
        <td>@{{ item.product_url }}</td>
        <td>@{{ item.minprice }}</td>
        <td>@{{ item.maxprice }}</td>
        <td>@{{ item.productimg }}</td>
        <td>@{{ item.deadline }}</td>
        <td>  
            <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>
            <button class="btn btn-danger" @click.prevent="deleteItem(item)">Delete</button>
        </td>
      </tr>
    </table>

    <!-- Pagination -->
    <nav>
          <ul class="pagination">
              <li v-if="pagination.current_page > 1">
                  <a href="#" aria-label="Previous"
                     @click.prevent="changePage(pagination.current_page - 1)">
                      <span aria-hidden="true">«</span>
                  </a>
              </li>
              <li v-for="page in pagesNumber"
                  v-bind:class="[ page == isActived ? 'active' : '']">
                  <a href="#"
                     @click.prevent="changePage(page)">@{{ page }}</a>
              </li>
              <li v-if="pagination.current_page < pagination.last_page">
                  <a href="#" aria-label="Next"
                     @click.prevent="changePage(pagination.current_page + 1)">
                      <span aria-hidden="true">»</span>
                  </a>
              </li>
          </ul>
      </nav>

      <!-- Create Item Modal -->
   

    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Create Item</h4>
          </div>
          <div class="modal-body">

              <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">

                 <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" name="title" class="form-control" v-model="newItem.title" />
                  <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">Detail:</label>
                  <textarea name="detail" class="form-control" v-model="newItem.detail"></textarea>
                  <span v-if="formErrors['detail']" class="error text-danger">@{{ formErrors['detail'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">Product_Url:</label>
                  <input type="url" placeholder="https://www.example.com" name="product_url" class="form-control" v-model="newItem.product_url" />
                  <span v-if="formErrors['product_url']" class="error text-danger">@{{ formErrors['product_url'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">MinPrice:</label>
                  <input type="text" name="minprice" class="form-control" v-model="newItem.minprice" />
                  <span v-if="formErrors['minprice']" class="error text-danger">@{{ formErrors['minprice'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">MaxPrice:</label>
                  <input type="text" name="maxprice" class="form-control" v-model="newItem.maxprice" />
                  <span v-if="formErrors['maxprice']" class="error text-danger">@{{ formErrors['maxprice'] }}</span>
                </div>  
                <div class="form-group">
                  <label for="title">ProductImg:</label>
                 
                  <input type="text" name="productimg" class="form-control" v-model="newItem.productimg" />
                  <span v-if="formErrors['productimg']" class="error text-danger">@{{ formErrors['productimg'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">ProductImg:</label>
                  <input type="date" name="deadline" class="form-control" v-model="newItem.deadline" />
                  <span v-if="formErrors['deadline']" class="error text-danger">@{{ formErrors['deadline'] }}</span>
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>

            
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Item Modal -->
    <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
          </div>
          <div class="modal-body">

              <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.campaigns_id)">
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" name="title" class="form-control" v-model="fillItem.title" />
                  <span v-if="formErrorsUpdate['title']" class="error text-danger">@{{ formErrorsUpdate['title'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">Detail:</label>
                  <textarea name="detail" class="form-control" v-model="fillItem.detail"></textarea>
                  <span v-if="formErrorsUpdate['detail']" class="error text-danger">@{{ formErrorsUpdate['detail'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">Product_Url:</label>
                  <input type="url" placeholder="https://www.example.com" name="product_url" class="form-control" v-model="fillItem.product_url" />
                  <span v-if="formErrorsUpdate['product_url']" class="error text-danger">@{{ formErrorsUpdate['product_url'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">MinPrice:</label>
                  <input type="number" name="minprice" class="form-control" v-model="fillItem.minprice" />
                  <span v-if="formErrorsUpdate['minprice']" class="error text-danger">@{{ formErrorsUpdate['minprice'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">MaxPrice:</label>
                  <input type="number" name="maxprice" class="form-control" v-model="fillItem.maxprice" />
                  <span v-if="formErrorsUpdate['maxprice']" class="error text-danger">@{{ formErrorsUpdate['maxprice'] }}</span>
                </div>  
                <div class="form-group">
                  <label for="title">ProductImg:</label>
                  <input type="text" name="productimg" class="form-control" v-model="fillItem.productimg" />
                  <span v-if="formErrorsUpdate['productimg']" class="error text-danger">@{{ formErrorsUpdate['productimg'] }}</span>
                </div>
                <div class="form-group">
                  <label for="title">ProductImg:</label>
                  <input type="date" name="deadline" class="form-control" v-model="fillItem.deadline" />
                  <span v-if="formErrorsUpdate['deadline']" class="error text-danger">@{{ formErrorsUpdate['deadline'] }}</span>
                </div>
                

          

          <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>

              </form>

          </div>
        </div>
      </div>
    </div>

  </div>

  
      </div>
     
      <!-- /.row (main row) -->
   

    </section>
@endsection

@section('vue')

  
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js') }}
{{ Html::script('https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js') }}
{{ Html::script('/js/item.js') }}

  
@endsection