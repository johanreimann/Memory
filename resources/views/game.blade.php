@extends('master')

@section('content')

<?php $counter = 0; ?>
<center>
	<form name=game>
		<table border=0>
			<td>
				<table border=1>
					<tr>
					@foreach ($pokes as $poke)
					<td><a><img src="images/tweety.png" border=0 height=150 width=150 name=<?php echo ++$counter; ?>></a></td>
					<?php if($counter % 6 == 0)
					{
						echo "</tr>";
						echo "<tr>";
					}
					?>
					@endforeach
					</table>
					</td>
					<td>
			</td>
		</table>
	</form>
</center>
<div class="secure">Secure Login form</div>
{!! Form::open(array('url'=>'account/login','method'=>'POST', 'id'=>'myform')) !!}
<div class="control-group">
  <div class="controls">
     {!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Email')) !!}
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
  </div>
</div>
{!! Form::button('Login', array('class'=>'send-btn')) !!}
{!! Form::close() !!}

@stop