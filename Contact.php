<?php
$success = '';
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim(strip_tags($_POST['name']  ?? ''));
    $email = trim(strip_tags($_POST['email'] ?? ''));
    $phone = trim(strip_tags($_POST['phone'] ?? ''));

    if (empty($name) || empty($email) || empty($phone)) {
        $error = 'Veuillez remplir tous les champs.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Adresse e-mail invalide.';
    } else {
        $to      = 'mosesitela646@gmail.com';
        $subject = "Message de $name — Portfolio Moise Mapuche ITELA";
        $body    = "Nom       : $name\nE-mail    : $email\nTelephone : $phone\n";
        $headers  = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

        if (mail($to, $subject, $body, $headers)) {
            $success = 'Message envoyé. Je vous répondrai sous 24h.';
        } else {
            $error = "Erreur lors de l'envoi. Écrivez directement à mosesitela646@gmail.com";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact — Moise Mapuche ITELA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root{--gold:#C9A84C;--gold-light:#E8C97A;--navy:#0A0F2C;--navy-mid:#111936;--navy-light:#1A2448;--white:#F4F1EC;--muted:#8A90A8;--border:rgba(201,168,76,0.15);--sans:'Syne',sans-serif;--mono:'Space Mono',monospace}
        *{margin:0;padding:0;box-sizing:border-box}
        body{background:var(--navy);color:var(--white);font-family:var(--sans);min-height:100vh;display:flex;flex-direction:column;line-height:1.6}
        body::before{content:'';position:fixed;inset:0;background-image:linear-gradient(rgba(201,168,76,0.025) 1px,transparent 1px),linear-gradient(90deg,rgba(201,168,76,0.025) 1px,transparent 1px);background-size:60px 60px;z-index:0;pointer-events:none}
        .glow{position:fixed;border-radius:50%;filter:blur(120px);z-index:0;pointer-events:none}
        .g1{width:500px;height:500px;background:rgba(201,168,76,0.06);top:-100px;right:-100px}
        .g2{width:400px;height:400px;background:rgba(26,36,72,0.8);bottom:0;left:-100px}

        nav{position:fixed;top:0;width:100%;z-index:100;padding:22px 5%;display:flex;justify-content:space-between;align-items:center;background:rgba(10,15,44,0.85);backdrop-filter:blur(20px);border-bottom:1px solid var(--border)}
        .nav-logo{font-family:var(--mono);font-size:13px;font-weight:700;color:var(--gold);letter-spacing:2px;text-decoration:none}
        .nav-links{display:flex;gap:35px;list-style:none;align-items:center}
        .nav-links a{font-family:var(--mono);font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:2px;color:var(--muted);text-decoration:none;transition:color .3s}
        .nav-links a:hover,.nav-links a.cur{color:var(--gold)}
        .nav-toggle{display:none;flex-direction:column;gap:5px;background:none;border:none;cursor:pointer;padding:4px}
        .nav-toggle span{display:block;width:20px;height:2px;background:var(--gold);transition:.3s}

        main{flex:1;display:flex;align-items:center;justify-content:center;padding:120px 5% 60px;position:relative;z-index:1}

        .wrap{width:100%;max-width:1000px;display:grid;grid-template-columns:1fr 1fr;gap:50px;align-items:start}

        .info-side h1{font-size:2.6rem;font-weight:800;letter-spacing:-1.5px;margin-bottom:10px;line-height:1.1}
        .info-side h1 span{color:var(--gold)}
        .info-tag{font-family:var(--mono);font-size:10px;letter-spacing:3px;color:var(--gold);text-transform:uppercase;margin-bottom:20px;display:flex;align-items:center;gap:10px}
        .info-tag::before{content:'';display:block;width:24px;height:1px;background:var(--gold)}
        .info-desc{color:var(--muted);font-size:14px;line-height:1.8;margin-bottom:40px}

        .channels{display:flex;flex-direction:column;gap:14px}
        .channel{display:flex;align-items:center;gap:16px;padding:18px 20px;border:1px solid var(--border);border-radius:8px;text-decoration:none;color:var(--white);transition:.3s;background:var(--navy-light)}
        .channel:hover{border-color:var(--gold);background:rgba(201,168,76,0.05);transform:translateX(4px)}
        .ch-icon{width:38px;height:38px;border:1px solid var(--border);border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:16px;background:rgba(201,168,76,0.06);flex-shrink:0}
        .ch-label{font-family:var(--mono);font-size:9px;color:var(--gold);letter-spacing:1px;text-transform:uppercase;margin-bottom:3px}
        .ch-val{font-size:13px;font-weight:600;word-break:break-all}

        .form-side{background:var(--navy-mid);border:1px solid var(--border);border-radius:12px;padding:45px;position:relative;overflow:hidden}
        .form-side::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,var(--gold),transparent)}

        .form-title{font-size:1.4rem;font-weight:800;letter-spacing:-0.5px;margin-bottom:6px}
        .form-sub{font-family:var(--mono);font-size:10px;color:var(--muted);letter-spacing:1px;margin-bottom:32px}

        .fg{display:flex;flex-direction:column;gap:7px;margin-bottom:20px}
        label{font-family:var(--mono);font-size:9px;color:var(--gold);text-transform:uppercase;letter-spacing:2px}
        input{background:rgba(255,255,255,0.04);border:1px solid var(--border);border-radius:6px;padding:15px 16px;color:var(--white);font-size:14px;font-family:var(--sans);outline:none;transition:.3s;width:100%}
        input:focus{border-color:var(--gold);background:rgba(201,168,76,0.04)}
        input::placeholder{color:rgba(138,144,168,0.5)}

        .submit{display:block;width:100%;padding:16px;border-radius:6px;font-weight:700;font-size:13px;background:var(--gold);color:var(--navy);border:none;cursor:pointer;font-family:var(--mono);letter-spacing:2px;text-transform:uppercase;transition:.3s;margin-top:28px}
        .submit:hover{background:var(--gold-light);transform:translateY(-2px);box-shadow:0 8px 24px rgba(201,168,76,0.3)}

        .alert{padding:13px 16px;border-radius:6px;font-size:13px;margin-bottom:22px;font-family:var(--mono)}
        .aok{background:rgba(74,222,128,0.08);border:1px solid rgba(74,222,128,0.25);color:#4ADE80}
        .aerr{background:rgba(248,113,113,0.08);border:1px solid rgba(248,113,113,0.25);color:#F87171}

        .back{display:inline-flex;align-items:center;gap:8px;margin-top:28px;font-family:var(--mono);font-size:10px;color:var(--muted);text-decoration:none;letter-spacing:1px;text-transform:uppercase;transition:color .3s}
        .back:hover{color:var(--gold)}

        footer{border-top:1px solid var(--border);padding:28px 5%;text-align:center;position:relative;z-index:1}
        .fc{font-family:var(--mono);font-size:10px;color:rgba(138,144,168,0.4);letter-spacing:1px}

        @media(max-width:768px){
            .nav-links{display:none;position:fixed;top:70px;left:0;right:0;background:rgba(10,15,44,.98);padding:28px 5%;flex-direction:column;gap:20px;border-bottom:1px solid var(--border)}
            .nav-links.open{display:flex}
            .nav-toggle{display:flex}
            .wrap{grid-template-columns:1fr;gap:35px}
            .form-side{padding:28px 22px}
            .info-side h1{font-size:2rem}
        }
    </style>
</head>
<body>
<div class="glow g1"></div>
<div class="glow g2"></div>

<nav>
    <a href="index.html" class="nav-logo">ITELA.GL</a>
    <button class="nav-toggle" aria-label="Menu" aria-expanded="false"><span></span><span></span><span></span></button>
    <ul class="nav-links">
        <li><a href="index.html">Accueil</a></li>
        <li><a href="index.html#ambitions">Ambitions</a></li>
        <li><a href="index.html#projets">Projets</a></li>
        <li><a href="index.html#vision">Vision</a></li>
        <li><a href="contact.php" class="cur">Contact</a></li>
    </ul>
</nav>

<main>
    <div class="wrap">
        <div class="info-side">
            <div class="info-tag">Initialiser le contact</div>
            <h1>Parlons de<br><span>l'avenir.</span></h1>
            <p class="info-desc">Collaboration académique, partenariat sur un projet ou simple échange sur l'indépendance numérique du Congo — je lis chaque message.</p>

            <div class="channels">
                <a href="mailto:mosesitela646@gmail.com" class="channel">
                    <div class="ch-icon">✉</div>
                    <div>
                        <div class="ch-label">E-mail</div>
                        <div class="ch-val">mosesitela646@gmail.com</div>
                    </div>
                </a>
                <a href="https://wa.me/243895999478" target="_blank" rel="noopener noreferrer" class="channel">
                    <div class="ch-icon">◎</div>
                    <div>
                        <div class="ch-label">WhatsApp</div>
                        <div class="ch-val">+243 895 999 478</div>
                    </div>
                </a>
                <a href="https://github.com/mosesitela646-crypto" target="_blank" rel="noopener noreferrer" class="channel">
                    <div class="ch-icon">⌥</div>
                    <div>
                        <div class="ch-label">GitHub</div>
                        <div class="ch-val">@mosesitela646-crypto</div>
                    </div>
                </a>
                <div class="channel" style="cursor:default">
                    <div class="ch-icon">◈</div>
                    <div>
                        <div class="ch-label">Localisation</div>
                        <div class="ch-val">Lubumbashi, RDC — UTC+2</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-side">
            <div class="form-title">Envoyer un message</div>
            <div class="form-sub">Réponse garantie sous 24h</div>

            <?php if ($success): ?>
                <div class="alert aok">&#10003; <?= htmlspecialchars($success) ?></div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="alert aerr">&#10005; <?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="contact.php">
                <div class="fg">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" placeholder="Votre nom complet" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                </div>
                <div class="fg">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="votre@email.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                </div>
                <div class="fg">
                    <label for="phone">Numéro de téléphone</label>
                    <input type="tel" id="phone" name="phone" placeholder="+243 XXX XXX XXX" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" required>
                </div>
                <button type="submit" class="submit">Envoyer →</button>
            </form>

            <a href="index.html" class="back">← Retour au portfolio</a>
        </div>
    </div>
</main>

<footer>
    <div class="fc">Moise Mapuche ITELA — BAC2 GL/IA — Université Protestante de Lubumbashi — 2026</div>
</footer>

<script>
    const tg=document.querySelector('.nav-toggle'),nl=document.querySelector('.nav-links');
    tg.addEventListener('click',()=>{const o=nl.classList.toggle('open');tg.setAttribute('aria-expanded',o)});
    document.addEventListener('click',e=>{if(!tg.contains(e.target)&&!nl.contains(e.target)){nl.classList.remove('open');tg.setAttribute('aria-expanded',false)}});
</script>
</body>
</html>