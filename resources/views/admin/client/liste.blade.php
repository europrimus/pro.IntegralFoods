@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <h2 class="admin>">Espace d'administration</h2>
  <h3>Liste des clients</h3>
  <table id="listeClients" class="table table-hover">
  <thead class="thead-light">
    <tr >
      <th scope="col">Entreprise</th>
      <th scope="col">Type d'établissement</th>
      <th scope="col">Contacte</th>
      <th scope="col">Téléphone</th>
      <th scope="col">e-mail</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    @foreach($listeClients as $client)
      <tr>
        <th><a href="{{ URL::route('admin.client.details',  ['idClient' => $client["id"]]) }}">{{ $client["entreprise"] }}</a></th>
        <td>
          @isset( $client["etabliementautre"] )
            {{ $client["etabliementautre"] }}
          @else
            {{ $client["etablissement"] }}
          @endisset
        </td>
        <td>{{ $client["civilite"] }} {{ $client["nom"] }} {{ $client["prenom"] }}</td>
        <td>{{ $client["tel"] }}</td>
        <td><a href="mailto:{{ $client["email"] }}">{{ $client["email"] }}</a></td>
        <td>{{ $client["role"] }}</td>
      </tr>
    @endforeach
  </ul>
  </table>
</main>

@include("layouts/footer")
