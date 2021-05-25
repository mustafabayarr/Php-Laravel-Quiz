<x-app-layout>
    <x-slot name="header">
        Quiz Oluştur
    </x-slot>


    <div class="card">
        <div class="card-body">
            <form action="{{route('quizzes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="">Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="4s">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <input id="isFinished" type="checkbox">
                    <label for="">Bitiş Tarihi Olacak mı?</label>
                </div>
                <div id="finishedInput" style="display: none" class="form-group">
                    <label for="">Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Quiz Oluştur</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function () {
                if ($('#isFinished').is(':checked')) {
                    $('#finishedInput').show()
                } else {
                    $('#finishedInput').hide()
                }
            })
        </script>
    </x-slot>
</x-app-layout>
