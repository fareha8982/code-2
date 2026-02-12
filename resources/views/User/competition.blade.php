@extends('User.Layout');




@section('content')



<style>
.section-title{font-weight:700;margin-bottom:20px}
.card{box-shadow:0 2px 10px rgba(0,0,0,.1)}
.timer{font-size:30px;font-weight:bold;color:#dc3545}
</style>

<!-- ================= COMPETITIONS LIST ================= -->
<section id="competition-list">
    <div class="container py-5">
        <h2 class="section-title">Competitions</h2>

        <div class="card mb-4">
            <div class="card-body">
                <h5>Essay Writing Competition 2024</h5>
                <p>Write an essay on digital publishing trends</p>
                <button class="btn btn-primary" onclick="openEssay()">Enter Competition</button>
            </div>
        </div>
    </div>
</section>

<!-- ================= ESSAY PAGE ================= -->
<section id="essay-section" class="d-none">
    <div class="container py-5">
        <button class="btn btn-sm btn-outline-secondary mb-3" onclick="goBack()">← Back</button>

        <h2 class="section-title">Essay Writing Competition</h2>

        <div class="mb-4">
            <h4>Time Remaining</h4>
            <div class="timer" id="timer">03:00:00</div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('competition.submit') }}">
            @csrf

            <div class="mb-3">
                <label>Essay Title</label>
                <input type="text" name="essayTitle" class="form-control" required >
            </div>

            <div class="mb-3">
                <label>Select Topic</label>
                <select name="selectedTopic" class="form-select" required>
                    <option value="">Choose Topic</option>
                    <option value="1">Future of Digital Publishing</option>
                    <option value="2">Importance of Reading</option>
                    <option value="3">Technology in Education</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Essay Content</label>
                <textarea name="essayContent" id="essayContent" rows="8" class="form-control" required></textarea>
                <small>Word Count: <span id="wordCount">0</span>/1000</small>
            </div>

            <button class="btn btn-primary">Submit Essay</button>
            <button type="button" class="btn btn-secondary" onclick="startTimer()">Start Timer</button>
        </form>
    </div>
</section>

<script>
function openEssay(){
    document.getElementById('competition-list').classList.add('d-none');
    document.getElementById('essay-section').classList.remove('d-none');
}

function goBack(){
    document.getElementById('essay-section').classList.add('d-none');
    document.getElementById('competition-list').classList.remove('d-none');
}

let seconds = 10800;
let interval;

function startTimer(){
    interval = setInterval(()=>{
        if(seconds <= 0){
            clearInterval(interval);
            alert("Time Over!");
            return;
        }
        seconds--;
        let h = Math.floor(seconds/3600);
        let m = Math.floor((seconds%3600)/60);
        let s = seconds%60;
        document.getElementById('timer').innerText =
            String(h).padStart(2,'0')+":"+
            String(m).padStart(2,'0')+":"+
            String(s).padStart(2,'0');
    },1000);
}

document.getElementById('essayContent').addEventListener('input', function(){
    let words = this.value.trim().split(/\s+/).filter(w => w.length);
    document.getElementById('wordCount').innerText = words.length;
});
</script>

    


@endsection
