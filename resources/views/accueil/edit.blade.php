<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="assets/images/baniere1.png">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>FAM'S CARS</title>
</head>
<body>
    <section class="location">
    <form action="{{ route('locations.update', $location->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="user">
        <!-- <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" readonly> -->

        <!-- <label for="car_brand">Marque de la Voiture:</label>
        <input type="text" name="marque" value="{{ $location->voitures->marque }}" required>

         <label for="car_model">Modèle de la Voiture:</label>
        <input type="text" name="modele" value="{{ $location->voitures->modele }}" required> -->
        <label for="brand">Marque :</label>
        <select id="brand" name="marque" value="{{ $location->voitures->marque }}"  onchange="updateModel()">
            <option value="">{{ $location->voitures->marque }}</option>
            <option value="renault">Renault</option>
            <option value="peugeot">Peugeot</option>
            <option value="ford">Ford</option>
            <option value="toyota">Toyota</option>
            <option value="volkswagen">Volkswagen</option>
            <option value="bmw">BMW</option>
            <option value="audi">Audi</option>
            <option value="mercedes">Mercedes</option>
            <option value="nissan">Nissan</option>
            <option value="fiat">Fiat</option>
            <option value="opel">Opel</option>
            <option value="hyundai">Hyundai</option>
            <option value="chevrolet">Chevrolet</option>
        </select>

        <label for="model">Modèle :</label>
        <select id="model" name="modele" value="" >
            <option value="">{{ $location->voitures->modele }}</option>
        </select>


        <!-- <label for="start_date">Date de Début:</label>
        <input type="date" name="datedebut" value="{{ $location->datedebut }}" required>


        <label for="end_date">Date de Fin</label>
        <input type="date" name="datefin" value="{{$location->paiements->datefin}}" required>

        <input type="hidden" name="statut" value="{{$location->paiements->statut}}" required> -->

    </div>

    <button class="button" type="submit">Modifier</button>
</form>
</section>
<script>
        const carData = {
            renault: ['Clio', 'Kangoo', 'Captur'],
            peugeot: ['208', '3008', '508'],
            ford: ['Fiesta', 'Focus', 'Kuga'],
            toyota: ['Yaris', 'Corolla', 'RAV4'],
            volkswagen: ['Polo', 'Golf', 'Tiguan'],
            bmw: ['Serie 1', 'Serie 3', 'X1'],
            audi: ['A1', 'A3', 'Q3'],
            mercedes: ['Classe A', 'Classe C', 'GLA'],
            nissan: ['Micra', 'Qashqai', 'Juke'],
            fiat: ['Panda', '500', 'Tipo'],
            opel: ['Corsa', 'Astra', 'Mokka'],
            hyundai: ['i10', 'i20', 'Tucson'],
            chevrolet: ['Spark', 'Cruze', 'Trax']
        };

        function updateModel() {
            const brand = document.getElementById('brand').value;
            const modelSelect = document.getElementById('model');

            // Vider les options précédentes
            modelSelect.innerHTML = '<option value="">Sélectionner un modèle</option>';

            if (brand) {
                const models = carData[brand];

                models.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model;
                    option.textContent = model;
                    modelSelect.appendChild(option);
                });
            }
        }
    </script>
</body>
</html>
