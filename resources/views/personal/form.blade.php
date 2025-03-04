
<div class="container">
    <form id="personalForm">
        @csrf
        <input type="hidden" name="id" value="{{ $personal->id ?? '' }}" id="personal_id">

        <!-- Paso 1 -->
        <div id="step1">
            <h2>Datos Personales</h2>
            <label>Nombre:</label>
            <input type="text" name="firstname" value="{{ $personal->firstname ?? '' }}" >

            <label>Apellido:</label>
            <input type="text" name="lastname" value="{{ $personal->lastname ?? '' }}" >

            <label>DNI:</label>
            <input type="text" name="dni" value="{{ $personal->dni ?? '' }}" >

            <label>Telefono:</label>
            <input type="text" name="phone" value="{{ $personal->phone ?? '' }}" >


            <label>Email:</label>
            <input type="text" name="email" value="{{ $personal->email ?? '' }}" >

            <label>Direccion:</label>
            <input type="text" name="address" value="{{ $personal->address ?? '' }}" >


            <label>Domicilio:</label>
            <input type="text" name="address" value="{{ $personal->address ?? '' }}" >

            <label>Localidad:</label>
            <input type="text" name="city" value="{{ $personal->city ?? '' }}" >

            <label>SS SS:</label>
            <input type="text" name="ss" value="{{ $personal->ss ?? '' }}" >

            <label>Fecha de Nacimiento:</label>
            <input type="text" name="birthdate" value="{{ $personal->birthdate ?? '' }}" >

            <label>IBAN:</label>
            <input type="text" name="iban" value="{{ $personal->iban ?? '' }}" >

            <label>Estado Civil:</label>
            <input type="text" name="marital_status" value="{{ $personal->marital_status ?? '' }}" >

            <label>Estudios:</label>
            <input type="text" name="studies" value="{{ $personal->studies ?? '' }}" >

            <label>Ultimo Empleo:</label>
            <input type="text" name="last_employment" value="{{ $personal->last_employment ?? '' }}" >

            <label>Discapacidad:</label>
            <input type="text" name="disability" value="{{ $personal->disability ?? '' }}" >

            <button type="button" onclick="nextStep(1)">Continuar</button>
        </div>

        <!-- Paso 2 -->
        <div id="step2" style="display: none;">
            <h2>Datos de la Empresa</h2>

            <label>Empresa:</label>
            <select name="company" required>
                <option value="">Selecciona una empresa</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $personal->company == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>

            <label>Proyecto:</label>
            <select name="project" required>
                <option value="">Selecciona un proyecto</option>
                @foreach($projects as $project)
                    <option value="{{ $project->ceco }}" {{ $personal->project == $project->ceco ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>

            <label>Centro de Trabajo:</label>
            <select name="work_center" required>
                <option value="">Selecciona un Centro de trabajo</option>
                @foreach($work_centers as $work_center)
                    <option value="{{ $work_center->id }}" {{ $personal->work_center == $work_center->id ? 'selected' : '' }}>
                        {{ $work_center->name }}
                    </option>
                @endforeach
            </select>

            <label>Fecha de alta:</label>
            <input type="date" name="joined_at" value="{{ $personal->joined_at ?? '' }}" >
    
       

            <label>Reclutador:</label>
            <select name="recruiter" required>
                <option value="">Selecciona un Reclutador</option>
                @foreach($recruiters as $recruiter)
                    <option value="{{ $recruiter->id }}" {{ $personal->recruiter == $recruiter->id ? 'selected' : '' }}>
                        {{ $recruiter->username }}
                    </option>
                @endforeach
            </select>
            <button type="button" onclick="prevStep(2)">Atrás</button>
            <button type="button" onclick="nextStep(2)">Continuar</button>
        </div>

        <!-- Paso 3 -->
        <div id="step3" style="display: none;">
            <h2>Trayectoria</h2>
            <label>Seleccionado:</label>
            <input type="text" name="selected" {{ $personal->selected ? 'checked' : '' }}>

            <button type="button" onclick="prevStep(3)">Atrás</button>
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

    document.getElementById("personalForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("{{ route('personal.save') }}", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert("Datos guardados correctamente");
            window.location.href = "/personal/success";
        })
        .catch(error => console.error("Error:", error));
    });
</script>
