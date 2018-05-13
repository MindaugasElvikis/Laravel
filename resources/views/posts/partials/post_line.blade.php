<tr role="row" class="even">
    <td>{{ $post->id }}</td>
    <td>{{ implode(', ', $post->categories()->pluck('name')->toArray()) }}</td>
    <td>{{ $post->user->name }}</td>
    <td>{{ $post->title }}</td>
    <td>{{ $post->slug }}</td>
    <td>{{ $post->comments->count() }}</td>
</tr>
