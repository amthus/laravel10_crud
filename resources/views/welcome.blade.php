<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Produits - Laravel 10</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        :root {
            --blue-dark: #2c3e50;
            --yellow-dark: #FFCC00; /* Couleur jaune MTN */
            --green-dark: #1f9c53;
            --red-dark: #c0392b;
            --white: #ffffff;
            --gray-darkest: #2c3e50;
            --gray-dark: #34495e;
            --gray-light: #2c3e50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Figtree', sans-serif;
        }

        body {
            background-color: var(--gray-darkest);
            color: var(--white);
        }

        .navbar {
            background-color: var(--blue-dark);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white);
        }

        .navbar .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .navbar .nav-links a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar .nav-links a:hover {
            opacity: 0.8;
        }

        .hero {
            background: linear-gradient(135deg, var(--blue-dark) 0%, #2980b9 100%);
            color: var(--white);
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            opacity: 0.9;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--green-dark);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: #218c57;
        }

        .features {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .features h2 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2rem;
            color: var(--white);
        }

        .feature-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
        }

        .feature-card {
            background-color: var(--gray-dark);
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            flex: 1;
            min-width: 280px;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .feature-card.create .icon {
            background-color: var(--green-dark);
        }

        .feature-card.read .icon {
            background-color: var(--blue-dark);
        }

        .feature-card.update .icon {
            background-color: var(--yellow-dark); /* Couleur jaune MTN */
        }

        .feature-card.delete .icon {
            background-color: var(--red-dark);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .feature-card p {
            color: #cccccc;
            margin-bottom: 1.5rem;
        }

        .how-it-works {
            background-color: var(--gray-dark);
            padding: 4rem 2rem;
        }

        .how-it-works h2 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2rem;
            color: var(--white);
        }

        .steps {
            max-width: 800px;
            margin: 0 auto;
        }

        .step {
            display: flex;
            gap: 2rem;
            margin-bottom: 2.5rem;
            align-items: flex-start;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            background-color: var(--blue-dark);
            color: var(--white);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            flex-shrink: 0;
        }

        .step-content h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--white);
        }

        .step-content p {
            color: #cccccc;
        }

        .preview {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .preview h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            color: var(--white);
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--gray-dark);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .product-table th,
        .product-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #444;
        }

        .product-table th {
            background-color: var(--blue-dark);
            color: var(--white);
            font-weight: 600;
        }

        .product-table tr:last-child td {
            border-bottom: none;
        }

        .product-table .action-btn {
            padding: 0.35rem 0.7rem;
            border-radius: 4px;
            font-size: 0.85rem;
            color: var(--white);
            text-decoration: none;
            margin-right: 0.5rem;
            display: inline-block;
        }

        .product-table .view-btn {
            background-color: var(--blue-dark);
        }

        .product-table .edit-btn {
            background-color: var(--yellow-dark); /* Couleur jaune MTN */
        }

        .product-table .delete-btn {
            background-color: var(--red-dark);
        }

        footer {
            background-color: var(--gray-darkest);
            color: var(--white);
            padding: 2rem;
            text-align: center;
        }

        footer p {
            margin-bottom: 0.5rem;
        }

        footer a {
            color: var(--blue-dark);
            text-decoration: none;
        }

        .contact-info {
            margin-top: 1rem;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .feature-grid {
                flex-direction: column;
                align-items: center;
            }

            .step {
                flex-direction: column;
                gap: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .product-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Thus-ProductManager</div>
        <div class="nav-links">
            <a href="{{ route('products.index') }}">Produits</a>
            <a href="{{ route('products.create') }}">Nouveau Produit</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Système CRUD de Gestion des Produits</h1>
        <p>Une application Laravel 10 développée par Malthus AMETEPE permettant de créer, lire, mettre à jour et supprimer des produits de manière efficace.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Voir tous les produits</a>
    </section>

    <section class="features">
        <h2>Fonctionnalités CRUD</h2>
        <div class="feature-grid">
            <div class="feature-card create">
                <div class="icon">C</div>
                <h3>Créer</h3>
                <p>Ajoutez facilement de nouveaux produits avec tous les détails nécessaires : nom, description, prix, quantité et catégorie.</p>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Ajouter un produit</a>
            </div>

            <div class="feature-card read">
                <div class="icon">R</div>
                <h3>Lire</h3>
                <p>Consultez la liste complète des produits ou visualisez les détails spécifiques d'un produit particulier.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Liste des produits</a>
            </div>

            <div class="feature-card update">
                <div class="icon">U</div>
                <h3>Mettre à jour</h3>
                <p>Modifiez les informations des produits existants pour les maintenir à jour dans votre inventaire.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Gérer les produits</a>
            </div>

            <div class="feature-card delete">
                <div class="icon">D</div>
                <h3>Supprimer</h3>
                <p>Retirez les produits obsolètes ou indisponibles de votre inventaire en un seul clic.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Gérer les produits</a>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <h2>Comment utiliser l'application</h2>
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Accéder à la liste des produits</h3>
                    <p>Visitez la page "Produits" pour voir tous les produits disponibles dans votre inventaire.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Ajouter un nouveau produit</h3>
                    <p>Cliquez sur "Nouveau Produit" et remplissez le formulaire avec les détails du produit.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Gérer les produits existants</h3>
                    <p>Utilisez les boutons "Voir", "Modifier" ou "Supprimer" pour chaque produit selon vos besoins.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Rechercher des produits</h3>
                    <p>Utilisez la fonction de recherche pour trouver rapidement des produits spécifiques dans votre inventaire.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="preview">
        <h2>Aperçu des Produits</h2>
        <table class="product-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom du produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Smartphone Pro</td>
                    <td>799,99 €</td>
                    <td>12</td>
                    <td>
                        <a href="#" class="action-btn view-btn">Voir</a>
                        <a href="#" class="action-btn edit-btn">Modifier</a>
                        <a href="#" class="action-btn delete-btn">Supprimer</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ordinateur Portable</td>
                    <td>1299,99 €</td>
                    <td>8</td>
                    <td>
                        <a href="#" class="action-btn view-btn">Voir</a>
                        <a href="#" class="action-btn edit-btn">Modifier</a>
                        <a href="#" class="action-btn delete-btn">Supprimer</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Écouteurs sans fil</td>
                    <td>129,99 €</td>
                    <td>24</td>
                    <td>
                        <a href="#" class="action-btn view-btn">Voir</a>
                        <a href="#" class="action-btn edit-btn">Modifier</a>
                        <a href="#" class="action-btn delete-btn">Supprimer</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Montre connectée</td>
                    <td>199,99 €</td>
                    <td>15</td>
                    <td>
                        <a href="#" class="action-btn view-btn">Voir</a>
                        <a href="#" class="action-btn edit-btn">Modifier</a>
                        <a href="#" class="action-btn delete-btn">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <footer>
        <p>Système de gestion CRUD des produits développé avec Laravel 10</p>
        <p>© 2025 - Tous droits réservés</p>
        <div class="contact-info">
            <p>Développé par <strong>Malthus AMETEPE</strong></p>
            <p>ametepemalthus16@gmail.com</a></p>
        </div>
    </footer>
</body>
</html>
