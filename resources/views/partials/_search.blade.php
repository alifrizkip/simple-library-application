{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
	<div class="input-group custom-search-form">
	    <input type="text" class="form-control" name="search" placeholder="Search...">
	    <span class="input-group-btn">
	        <button class="btn btn-default" type="submit">
	            <i class="glyphicon glyphicon-search"></i>
	        </button>
	    </span>
	</div>
{!! Form::close() !!}
