@extends('layouts.sidbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/style.js')}}" defer></script>
    <title>Document</title>
</head>
<body>
    <section class="location">
    <form id="carForm" action="{{route('voiture.store')}}" method="POST">
        @csrf
        <label for="brand">Marque :</label>
        <select id="brand" name="marque"  onchange="updateModel()">
            <option value="">Sélectionner une marque</option>
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
        <select id="model" name="modele">
            <option value="">Sélectionner un modèle</option>
        </select>
        
       <button class="button" type="submit">Suivant</button>
    </form>

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
    </section>
</body>
</html>
@endsection