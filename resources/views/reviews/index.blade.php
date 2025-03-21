
<x-container>
    <h1>Отзывы</h1>

    @auth
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" placeholder="Напишите ваш отзыв"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    @endauth

    <div class="mt-4">
        @foreach ($reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $review->user->name }}</h5>
                <p class="card-text">{{ $review->content }}</p>
                <p class="text-muted">{{ $review->created_at->diffForHumans() }}</p>

                @can('delete', $review)
                <form action="{{ route('reviws.destroy', $review) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
                @endcan
            </div>
        </div>
        @endforeach
    </div>

</x-container>

