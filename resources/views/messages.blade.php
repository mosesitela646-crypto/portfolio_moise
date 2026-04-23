<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Messages | Portfolio Moses</title>
    <style>
        :root {
            --bg-color: #0A0F2C;
            --card-bg: #1a1f3c;
            --accent: #C9A84C;
            --text: #ffffff;
            --success: #27ae60;
            --danger: #e74c3c;
            --info: #3498db;
        }

        body { 
            background: var(--bg-color); 
            color: var(--text); 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            padding: 40px 20px;
            margin: 0;
        }

        .container { max-width: 1100px; margin: 0 auto; }

        h1 {
            color: var(--accent);
            border-bottom: 2px solid var(--accent);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .alert-success {
            background: var(--success);
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            background: var(--card-bg); 
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            border-radius: 8px;
            overflow: hidden;
        }

        th { 
            background: var(--accent); 
            color: var(--bg-color); 
            padding: 15px; 
            text-align: left; 
            text-transform: uppercase;
            font-size: 14px;
        }

        td { 
            padding: 15px; 
            border-bottom: 1px solid #2d355a; 
            vertical-align: middle;
        }

        /* Style pour les champs modifiables */
        .input-edit {
            background: #2d355a;
            color: white;
            border: 1px solid transparent;
            padding: 8px;
            border-radius: 4px;
            width: 95%;
            transition: 0.3s;
        }

        .input-edit:focus {
            border-color: var(--accent);
            outline: none;
            background: #334155;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-nouveau { background: #e67e22; color: white; }
        .badge-lu { background: var(--success); color: white; }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-save { background: var(--info); }
        .btn-lu { background: var(--success); }
        .btn-del { background: var(--danger); }
        
        .btn:hover { opacity: 0.8; transform: scale(1.05); }

        .actions-group { display: flex; gap: 8px; flex-wrap: wrap; }

        .nav-link {
            color: var(--accent);
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="/" class="nav-link">← Quitter l'administration</a>
        
        <h1>Gestion des Messages (CRUD)</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Statut</th>
                    <th>Nom (Modifiable)</th>
                    <th>Message (Modifiable)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr>
                    <form action="{{ route('contact.update', $message->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <td>
                            <span class="badge {{ $message->status == 'Nouveau' ? 'badge-nouveau' : 'badge-lu' }}">
                                {{ $message->status }}
                            </span>
                        </td>
                        <td>
                            <input type="text" name="name" value="{{ $message->name }}" class="input-edit">
                            <br><small style="color: #bdc3c7;">{{ $message->email }}</small>
                        </td>
                        <td>
                            <textarea name="message" class="input-edit" rows="2">{{ $message->message }}</textarea>
                        </td>
                        <td>
                            <div class="actions-group">
                                {{-- SAUVEGARDER LES CORRECTIONS --}}
                                <button type="submit" class="btn btn-save" title="Enregistrer les corrections">💾</button>
                    </form>

                                {{-- MARQUER COMME LU --}}
                                @if($message->status == 'Nouveau')
                                <form action="{{ route('contact.read', $message->id) }}" method="POST">
                                    @csrf 
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-lu" title="Marquer comme lu">✓</button>
                                </form>
                                @endif

                                {{-- SUPPRIMER --}}
                                <form action="{{ route('contact.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement ?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-del" title="Supprimer">🗑</button>
                                </form>
                            </div>
                        </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 30px;">Aucun message reçu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>