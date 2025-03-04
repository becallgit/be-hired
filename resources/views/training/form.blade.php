
<div class="container">
    <form id="trainingForm">
        @csrf
        <input type="hidden" name="id" value="{{ $training->id ?? '' }}" id="training_id">

        <!-- Paso 1 -->
        <div id="step1">
            <h2>Datos Formacion</h2>
            <label>Empresa:</label>
            <select name="company" required>
                <option value="">Selecciona una empresa</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $training->company == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>

            <label>Proyecto:</label>
            <select name="project" required>
                <option value="">Selecciona un proyecto</option>
                @foreach($projects as $project)
                    <option value="{{ $project->ceco }}" {{ $training->project == $project->ceco ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>

            
            <label>Centro de Trabajo:</label>
            <select name="work_center" required>
                <option value="">Selecciona un Centro de trabajo</option>
                @foreach($work_centers as $work_center)
                    <option value="{{ $work_center->id }}" {{ $training->work_center == $work_center->id ? 'selected' : '' }}>
                        {{ $work_center->name }}
                    </option>
                @endforeach
            </select>

            <select name="trainer" required>
                <option value="">Selecciona un Formador</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $training->trainer == $trainer->id ? 'selected' : '' }}>
                        {{ $trainer->username }}
                    </option>
                @endforeach
            </select>


            <label>Sala:</label>
            <input type="text" name="hall" value="{{ $training->hall ?? '' }}" >

            <label>Numero de Personas:</label>
            <input type="text" name="personal_count" value="{{ $training->personal_count ?? '' }}" >


            <label>Fecha Inicio:</label>
            <input type="date" name="start_date" value="{{ $training->start_date ?? '' }}" >

            <label>Fecha Fin:</label>
            <input type="date" name="end_date" value="{{ $training->end_date ?? '' }}" >

            <label>Reclutador:</label>
            <select name="recruiter" required>
                <option value="">Selecciona un Reclutador</option>
                @foreach($recruiters as $recruiter)
                    <option value="{{ $recruiter->id }}" {{ $training->recruiter == $recruiter->id ? 'selected' : '' }}>
                        {{ $recruiter->username }}
                    </option>
                @endforeach

            </select>

            <label>Anuncio:</label>
            <textarea name="announcement" >{{ $training->announcement ?? '' }}</textarea>
           

            <button type="button" onclick="nextStep(1)">Continuar</button>
        </div>

        <!-- Paso 2 -->
        <div id="step2" style="display: none;">
            <h2>Resultado</h2>

            <label>Completada:</label>
            <input type="text" name="completed" value="{{ $training->completed ?? '' }}" >

            <label>Numero de personas que comienzan:</label>
            <input type="text" name="starting_count" value="{{ $training->starting_count ?? '' }}" >

            <label>Numero de personas que finalizan:</label>
            <input type="text" name="completed" value="{{ $training->completed ?? '' }}" >

            <label>Numero de personas que superan el mes de prueba:</label>
            <input type="text" name="ending_count" value="{{ $training->ending_count ?? '' }}" >

            <label>Observaciones:</label>
            <textarea name="notes" >{{ $training->notes ?? '' }}</textarea>


            <button type="button" onclick="prevStep(2)">Atrás</button>
            <button type="submit">Guardar</button>
        </div>

       
    </form>
</div>

<script>
    let currentStep = 1;

    function nextStep(step) {
        document.getElementById(`step${step}`).style.display = "none";
        document.getElementById(`step${step + 1}`).style.display = "block";
    }

    function prevStep(step) {
        document.getElementById(`step${step}`).style.display = "none";
        document.getElementById(`step${step - 1}`).style.display = "block";
    }

    document.getElementById("trainingForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("{{ route('training.save') }}", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert("Datos guardados correctamente");
            window.location.href = "/dashboard";
        })
        .catch(error => console.error("Error:", error));
    });
</script>
