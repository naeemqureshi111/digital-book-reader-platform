<!DOCTYPE html>
<html>
<head>
    <title>Chapters</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .Contents {
            padding: 30px 20px 40px; /* Top/left/right and extra bottom padding */
            box-sizing: border-box;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .chapter-scroll {
            overflow-y: auto;
            flex-grow: 1;
            padding-bottom: 20px;
        }

        .chapter-list ul {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
        }

        .chapter-list li {
            padding: 12px 18px;
            background: #ffffff;
            margin-bottom: 10px;
            cursor: pointer;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.06);
            transition: background-color 0.2s ease;
        }

        .chapter-list li:hover {
            background-color: #eef1f5;
        }

        p {
            text-align: center;
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="Contents">
        <h2>Contents</h2>

        @if($chapters->isEmpty())
            <p>No chapters found.</p>
        @else
            @php
                $isScrollable = $chapters->count() > 10;
            @endphp

            <div class="chapter-scroll chapter-list" style="{{ $isScrollable ? 'max-height: 450px;' : '' }}">
                <ul>
                    @foreach($chapters as $chapter)
                        <li onclick="startQuiz({{ $chapter->id }})">
                            📘 {{ $chapter->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script>
        function startQuiz(chapterId) {
            const subjectName = "{{ $subjectName }}";
            const classId = "{{ $classId }}";
            window.parent.loadQuizAndOMR(subjectName, classId, chapterId);
        }
    </script>
</body>
</html>
