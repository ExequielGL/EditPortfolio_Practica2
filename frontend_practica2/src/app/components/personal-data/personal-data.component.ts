import { Component, Input, OnChanges, SimpleChanges  } from '@angular/core';
import Profile from '../../models/profile.model';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-personal-data',
  templateUrl: './personal-data.component.html',
  styleUrl: './personal-data.component.css'
})
export class PersonalDataComponent implements OnChanges{
  @Input() personalData!: Profile['user']['personal_data'];

  formulario = {
    id: 0,
    age: 0,
    origin_city: '',
    origin_country: '',
    email:''
  };
  editing = false;

  constructor(private profileService: ProfileService) { }

  ngOnChanges(changes: SimpleChanges) {
    if (changes['personal_data']) {
      this.formulario = {
        id: this.personalData.id,
        age: this.personalData.age,
        origin_city: this.personalData.origin_city,
        origin_country: this.personalData.origin_country,
        email:this.personalData.email
      };
    }
  }

  toggleEdit() {
    this.editing = !this.editing;
    if (!this.editing) {
      this.saveChanges();
    }
  }

  saveChanges() {
    this.profileService.updatePersonalData(this.personalData).subscribe({
      next: response => {
        console.log(response);
      },
      error: error => {
        console.error(error);
      }
    });
  }

}
