<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | ITELA</title>
    <style>
        body { 
            background: #0A0F2C; 
            color: white; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
        }

        .contact-card {
            background: #1a1f3c;
            padding: 40px;
            border-radius: 15px;
            border: 1px solid #C9A84C;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 { color: #C9A84C; margin-bottom: 10px; }
        p { color: #bdc3c7; margin-bottom: 30px; }

        .form-group { margin-bottom: 15px; text-align: left; }
        
        input, textarea {
            width: 100%;
            padding: 12px;
            background: #0A0F2C;
            border: 1px solid #34495e;
            border-radius: 5px;
            color: white;
            box-sizing: border-box; 
        }

        input:focus, textarea:focus {
            border-color: #C9A84C;
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            background: #C9A84C;
            border: none;
            color: #0A0F2C;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover { background: #e2c065; transform: translateY(-2px); }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 14px;
        }
        .alert-success { background: #27ae60; color: white; }
        .alert-danger { background: #e74c3c; color: white; text-align: left; }

        .back-link {
            margin-top: 25px;
            display: block;
            color: #C9A84C;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="contact-card">
        <h1>Contactez-moi</h1>
        <p>Disponible pour projet ou stage</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <input type="text" name="name" placeholder="Votre Nom complet" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Votre Email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <input type="text" name="phone" placeholder="Téléphone" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <textarea name="message" rows="4" placeholder="Votre message ici..." required>{{ old('message') }}</textarea>
            </div>

            <button type="submit">Envoyer le message</button>
        </form>

        <a href="/" class="back-link">← Retour au portfolio</a>
    </div>

</body>
</html>