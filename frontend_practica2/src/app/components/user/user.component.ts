import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import Profile from '../../models/profile.model';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrl: './user.component.css'
})
export class UserComponent implements OnChanges {
  @Input() user!: Profile['user'];

  formulario = {
    id: 0,
    name: '',
    description: ''
  };
  editing = false;

  constructor(private profileService: ProfileService) { }

  ngOnChanges(changes: SimpleChanges) {
    if (changes['user']) {
      this.formulario = {
        id: this.user.id,
        name: this.user.name,
        description: this.user.description
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
    this.profileService.updateUser(this.user).subscribe({
      next: response => {
        console.log(response);
      },
      error: error => {
        console.error(error);
      }
    });
  }
}
