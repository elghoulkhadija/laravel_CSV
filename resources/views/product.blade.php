<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">
            Produits AliExpress
        </h1>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            
            @foreach($product as $produit)
            <div class="bg-white rounded-lg shadow hover:shadow-xl transition duration-300 relative">

                <!-- Badge réduction -->
                @if(!empty($produit->Pourcentage_reduction))
                <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                    -{{ $produit->Pourcentage_reduction }}%
                </span>
                @endif

                <!-- Image -->
                @php
                    $img = $produit->imag_p;

                    if ($img) {
                        $img = str_replace('http://', 'https://', $img);
                        $img = str_replace('.avif', '', $img);
                    }
                @endphp

                <img 
                    src="{{ $img ?: 'https://via.placeholder.com/300x300?text=No+Image' }}"
                    referrerpolicy="no-referrer"
                    onerror="this.src='https://via.placeholder.com/300x300?text=Image+Blocked'"
                    class="w-full h-40 object-cover rounded-t-lg"
                />


                <!-- Contenu -->
                <div class="p-3">
                    <h2 class="text-sm text-gray-700 line-clamp-2 mb-2">
                        {{ $produit->nom_p }}
                    </h2>

                    <!-- Prix -->
                    <div class="text-red-600 font-bold text-lg">
                        {{ number_format($produit->prix_p, 2) }} DH
                    </div>

                    <!-- Infos bas -->
                    <div class="flex justify-between items-center text-xs text-gray-500 mt-2">
                        <span>
                            {{ $produit->nb_vente }} ventes
                        </span>
                        <span class="text-yellow-500">
                            ★★★★☆
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</body>
</html>
