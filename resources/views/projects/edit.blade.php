<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Projet</title>
    <style>
        body { background:#0A0F2C; color:white; font-family:sans-serif; text-align:center; padding:50px; }
        input, textarea { width: 300px; padding: 10px; margin: 10px; border: 1px solid #C9A84C; background: #1a1f3c; color: white; }
        button { padding: 10px 20px; background: #C9A84C; border: none; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Modifier : {{ $project->title }}</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Obligatoire pour la modification en Laravel --}}
        <input type="text" name="title" value="{{ $project->title }}" required><br>
        <textarea name="description" rows="4" required>{{ $project->description }}</textarea><br>
        <button type="submit">Mettre à jour le projet</button>
    </form>

    <br>
    <a href="{{ route('projects.index') }}" style="color:#C9A84C;">Annuler</a>
</body>
</html>