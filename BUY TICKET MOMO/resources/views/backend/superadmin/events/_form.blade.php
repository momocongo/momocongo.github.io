<div class="mt-3 mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Nom de l'évènement</label>
    <div class="col-sm-10">
        <input name="name" class="form-control" type="text"
            value="{{ old('name', $event->name) }}" id="example-text-input">
    </div>
</div>
<div class="mt-3 mb-3 row">
    <label for="date_heure_debut" class="col-sm-2 col-form-label">Date et heure de début</label>
    <div class="col-sm-10">
        <input name="date_heure_debut" class="form-control" type="datetime-local"
            value="{{ old('date_heure_debut', $event->date_heure_debut) }}" id="example-text-input">
    </div>
</div>
<div class="mt-3 mb-3 row">
    <label for="date_heure_fin" class="col-sm-2 col-form-label">Date et heure de Fin</label>
    <div class="col-sm-10">
        <input name="date_heure_fin" class="form-control" type="datetime-local"
               value="{{ old('date_heure_fin', $event->date_heure_fin) }}" id="example-text-input">
    </div>
</div>
<div class="mt-3 mb-3 row">
    <label for="type_event_id" class="col-sm-2 col-form-label">Type d'évènement</label>
    <div class="col-sm-10">
        <select name="type_event_id" id="type_event_id" class="form-control @error('type_event_id') is-invalid @enderror">
            @foreach ($typeEvents as $id => $name)
                <option {{ $id === old('type_event_id', $event->type_event_id) ? 'selected' : '' }}
                    value={{ $id }}>{{ $name }}</option>
            @endforeach

            @error('user_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </select>
    </div>
</div>
<div class="mt-3 mb-3 row">
    <label for="lieu" class="col-sm-2 col-form-label">Lieu</label>
    <div class="col-sm-10">
        <input name="lieu" class="form-control" type="text"
               value="{{ old('lieu', $event->lieu) }}" id="example-text-input">
    </div>
</div>
<div class="mt-3 mb-3 row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <input name="description" class="form-control" type="text"
               value="{{ old('description', $event->description) }}" id="example-text-input">
    </div>
</div>
<div class="mt-3 mb-3 row">
    <label for="description" class="col-sm-2 col-form-label">Prix du ticket</label>
    <div class="col-sm-10">
        <input name="prix_ticket" class="form-control" type="number" placeholder="500"
               value="{{ old('prix_ticket', $event->prix_ticket) }}" id="example-text-input">
    </div>
</div>
<!-- end row -->
<div class="mt-3 mb-3 row">
    <label for="image" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
        <div>
            <input type="file" class="form-control" name="image" accept="image/*" id="image">
        </div>
        <div class="mt-3 mb-3 row">
            <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg"
                    src="{{ !empty($event->image) ? url('upload/admin_images/images/' . $event->image) : url('upload/no_image.jpg') }}"
                    alt="Card image cap">
            </div>
        </div>
    </div>
</div>

<!-- end row -->
<input type="submit" class="btn btn-custom waves-effect waves-light" value="Enregistrer">
<a href="{{ route('superadmin.index_event') }}"
    class=" btn btn-outline-secondary waves-effect waves-light">Annuler</a>
