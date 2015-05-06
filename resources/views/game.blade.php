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

<script type="text/javascript">
$("img").click(function(){
	x = $(this).attr('name');
	var b = {{ $pokes[1] }}
	$(this).attr('src', 'images/A.png');
	console.log({{ $pokes[1] }});
});

</script>

@stop