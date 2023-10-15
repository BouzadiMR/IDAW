<a href="index.php?page=Projets&lang=fr">Français</a>

<h2><strong>Projects</strong></h2>
<section class="section-projets">
    <?php
    $projects = [
        [
            "title" => "Queue Optimization at Agdal Railway Station",
            "description" => "Modeling, simulation of queues, and solution for optimization.",
        ],
        [
            "title" => "Development of a 'Business Case CRM' Marketing Plan",
            "description" => "Development of a marketing plan for a company using a transactional and relational approach.",
        ],
        [
            "title" => "Company Production Planning",
            "description" => "Preparation of stock sheets, PIC, PDP, MRP.",
        ],
    ];
    
    foreach ($projects as $project): ?>
        <h3><?php echo htmlspecialchars($project["title"]); ?></h3>
        <p><?php echo htmlspecialchars($project["description"]); ?></p>
    <?php endforeach; ?>
</section>

