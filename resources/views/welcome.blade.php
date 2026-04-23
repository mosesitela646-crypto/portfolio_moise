<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITELA MUTACH MOISE | Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{ background:#0A0F2C; color:#F4F1EC; font-family:'Syne',sans-serif; margin:0; }
        nav{ position:fixed; top:0; width:100%; background:#0A0F2C; padding:15px; display:flex; justify-content:space-between; z-index: 1000; }
        .nav-links{ display:flex; gap:20px; list-style:none; margin-right: 30px; }
        .nav-links a{ color:#aaa; text-decoration:none; }
        .nav-links a:hover{ color:#C9A84C; }
        .hero{ display:flex; justify-content:space-around; align-items:center; height:100vh; }
        
       
        .hero img{ 
            width: 280px; 
            height: 280px; 
            border-radius: 50%; 
            border: 4px solid #C9A84C; 
            object-fit: cover;
            box-shadow: 0 0 20px rgba(201, 168, 76, 0.2); /* Petit effet de lumière */
        }

        .btn{ padding:10px 20px; border:1px solid #C9A84C; color:#C9A84C; text-decoration:none; }
        section{ padding:60px; }
        .amb-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:20px; }
        .amb-card{ border:1px solid #C9A84C33; padding:20px; border-radius:8px; }
    </style>
</head>
<body>
    <nav>
        <strong>ITELA</strong>
        <ul class="nav-links">
            <li><a href="#">Accueil</a></li>
            <li><a href="#ambitions">Ambitions</a></li>
            <li><a href="#projets">Projets</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>

    <div class="hero">
        <div>
            <h1>ITELA MUTACH MOISE</h1>
            <p>BAC 2 Génie Logiciel</p>
            <p>Étudiant passionné par le développement web et l’informatique.</p>
            <a href="#ambitions" class="btn">Mes ambitions</a>
        </div>
        <div>
            <img src="{{ asset('moi.jpg') }}" alt="photo">
        </div>
    </div>

    <section id="ambitions">
        <h2>Mes ambitions</h2>
        <div class="amb-grid" id="ae"></div>
    </section>

    <section id="projets">
        <h2>Mes projets</h2>
        <h3>Portfolio personnel</h3>
        <p>Création d’un site web avec HTML, CSS et Laravel.</p>
        <h3>Formulaire contact</h3>
        <p>Envoi de message avec enregistrement en base de données.</p>
    </section>

    <script>
        const data = [
            {title:"Devenir ingénieur logiciel",desc:"Apprendre et maîtriser la programmation."},
            {title:"Maîtriser Laravel",desc:"Créer des applications web professionnelles."},
            {title:"Apprendre l’IA",desc:"Comprendre les bases du machine learning."},
            {title:"Faire un stage",desc:"Acquérir de l’expérience professionnelle."},
            {title:"Créer des projets",desc:"Développer des solutions concrètes."},
            {title:"Créer une startup",desc:"Lancer un projet technologique en RDC."}
        ];
        const g = document.getElementById('ae');
        data.forEach(a=>{
            const c=document.createElement('div');
            c.className='amb-card';
            c.innerHTML=`<h3>${a.title}</h3><p>${a.desc}</p>`;
            g.appendChild(c);
        });
    </script>
</body>
</html>