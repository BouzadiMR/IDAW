<a href="index.php?page=Projets&lang=en">Anglais</a>

<h2><strong>Projets</strong></h2>
<section class="section-projets">
    <?php
    $projects = [
        [
            "title" => "Optimisation des files d’attente à la gare ferroviaire Agdal",
            "description" => "Modélisation, simulation des files d’attentes et solution pour l’optimisation.",
        ],
        [
            "title" => "Réalisation d'un plan marketing 'Business Case CRM'",
            "description" => "Développement d'un plan marketing pour une entreprise en utilisant une approche transactionnelle et relationnelle.",
        ],
        [
            "title" => "Planification de la production d'une entreprise",
            "description" => "Élaboration des fiches de stocks, PIC, PDP, MRP.",
        ],
    ];
    
    foreach ($projects as $project): ?>
        <h3><?php echo htmlspecialchars($project["title"]); ?></h3>
        <p><?php echo htmlspecialchars($project["description"]); ?></p>
    <?php endforeach; ?>
</section>
