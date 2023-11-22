import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import Profile from '../../models/profile.model';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-frameworks',
  templateUrl: './frameworks.component.html',
  styleUrl: './frameworks.component.css'
})
export class FrameworksComponent {
  @Input() frameworks!: Profile['user']['framework'];

  formulario = {
    frameworks: [] as any
  };
  editing = false;

  constructor(private profileService: ProfileService) { }

  ngOnChanges(changes: SimpleChanges) {
    if (changes['frameworks']) {
      this.formulario.frameworks = this.frameworks.map(framework => ({
        id: framework.id,
        name: framework.name,
        knowledge: framework.knowledge
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
    this.profileService.updateFrameworks(this.formulario.frameworks).subscribe({
      next: response => {
        console.log(response);
      },
      error: error => {
        console.error(error);
      }
    });
  }
}
