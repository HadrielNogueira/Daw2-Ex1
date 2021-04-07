<!DOCTYPE html>
<html>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<body>
		<form method="POST" action="/carro">
			@csrf
			<div>
				 <label for="marca">Marca: </label>
				 <input type="text" id="marca" name="marca" value="{{ $carro->marca }}"/>
			</div>
			<div>
				<label for="modelo">Modelo: </label>
				<input type="text" id="modelo" name="modelo" value="{{ $carro->modelo }}"/>
			</div>
			<div>
				 <label for="placa">Placa: </label>
				 <input type="text" id="placa" name="placa" value="{{ $carro->placa }}"/>
			</div>
			<div>
				 <label for="cor">Cor: </label>
				 <input type="text" id="cor" name="cor" value="{{ $carro->cor }}"/>
			</div>
			<div>
				 <label for="fabricacao">Fabricação: </label>
				 <input type="text" id="fabricacao" name="fabricacao" value="{{ $carro->fabricacao }}"/>
			</div>
			<div>
				<a href="/carro">Novo</a>
				<input type="hidden" id="id" name="id" value="{{ $carro->id }}"/>
				<button type="submit">Salvar</button>
			</div>
		</form>
		
		<table border="1">
			<thead>
				<tr>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Cor</th>
					<th>fabricacao</th>
					<th>Editar</th>
					<th>Deletar</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($carros as $carro)
					<tr>
						<td>{{ $carro->marca}}</td>
						<td>{{ $carro->modelo}}</td>
						<td>{{ $carro->cor}}</td>
						<td>{{ $carro->fabricacao}}</td>
						<td>
							<a href="/carro/{{ $carro->id }}/edit">Edit</a>
						</td>
						<td>
							<form action="/carro/{{ $carro->id }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="DELETE" />
								<button type="submit" onclick="return confirm('Tem Certaza?')">Excluir</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</body>
</html>