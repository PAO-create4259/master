<?php
session_start();
include("../inc/fonction.php");
$emp_no = $_GET['emp_no'];
$result = get_fiche_employe($emp_no);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche employé <?= htmlspecialchars($emp_no) ?></title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header class="bg-primary text-white p-3">
    <div class="container">
        <h1 class="h4">Fiche de l'employé n°<?= htmlspecialchars($emp_no) ?></h1>
    </div>
</header>

<main class="container my-4">
    <?php if ($info): ?>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($info['first_name'] . ' ' . $info['last_name']) ?></h5>
            <p><strong>Sexe :</strong> <?= htmlspecialchars($info['gender']) ?></p>
            <p><strong>Date d'embauche :</strong> <?= htmlspecialchars($info['hire_date']) ?></p>
        </div>
    </div>
    <?php else: ?>
        <div class="alert alert-danger">Aucun employé trouvé.</div>
    <?php endif; ?>

    <div class="mb-4">
        <h4>💰 Historique des salaires</h4>
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Salaire</th>
                    <th>De</th>
                    <th>À</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salaires as $salaire): ?>
                <tr>
                    <td><?= htmlspecialchars($salaire['salary']) ?> $</td>
                    <td><?= htmlspecialchars($salaire['from_date']) ?></td>
                    <td><?= htmlspecialchars($salaire['to_date']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mb-4">
        <h4>🧑‍💼 Historique des titres</h4>
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Titre</th>
                    <th>De</th>
                    <th>À</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($titres as $titre): ?>
                <tr>
                    <td><?= htmlspecialchars($titre['title']) ?></td>
                    <td><?= htmlspecialchars($titre['from_date']) ?></td>
                    <td><?= htmlspecialchars($titre['to_date']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="departements.php" class="btn btn-secondary">⬅ Retour</a>
</main>

<footer class="bg-light text-center py-3">
    <p class="mb-0">Projet Employees DB - ETU4221-4259</p>
</footer>

</body>
</html>

