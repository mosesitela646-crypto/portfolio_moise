<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Projets</title>
    <style>
        body { background:#0A0F2C; color:white; font-family:sans-serif; padding:50px; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        th, td { border: 1px solid #C9A84C; padding: 15px; text-align: left; }
        th { background: #1a1f3c; color: #C9A84C; }
        .btn { padding: 8px 12px; text-decoration: none; border-radius: 4px; display: inline-block; }
        .btn-add { background: #C9A84C; color: #0A0F2C; font-weight: bold; margin-bottom: 20px; }
        .btn-edit { background: #4a90e2; color: white; }
        .btn-delete { background: #ff4d4d; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Administration des Projets</h1>
    
    <a href="{{ route('projects.create') }}" class="btn btn-add">+ Ajouter un Projet</a>

    @if(session('success'))
        <p style="color: #C9A84C;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-edit">Modifier</a>
                    
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Supprimer ce projet ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="/" style="color:#C9A84C;">← Retour au Portfolio</a>
</body>
</html>