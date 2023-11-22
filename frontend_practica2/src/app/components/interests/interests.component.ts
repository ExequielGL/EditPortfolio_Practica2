import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import Profile from '../../models/profile.model';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-interests',
  templateUrl: './interests.component.html',
  styleUrl: './interests.component.css'
})
export class InterestsComponent {
  @Input() interests!: Profile['user']['interest'];

  formulario = {
    interests: [] as any
  };
  editing = false;

  constructor(private profileService: ProfileService) { }

  ngOnChanges(changes: SimpleChanges) {
    if (changes['interests']) {
      this.formulario.interests = this.interests.map(interest => ({
        id: interest.id,
        activity: interest.activity
      }));
    }
  }

  toggleEdit() {
    this.editing = !this.editing;
    if (!this.editing) {
      this.saveChanges();
    }
  }

  saveChanges() {
    this.profileService.updateInterests(this.formulario.interests).subscribe({
      next: response => {
        console.log(response);
      },
      error: error => {
        console.error(error);
      }
    });
  }
}
