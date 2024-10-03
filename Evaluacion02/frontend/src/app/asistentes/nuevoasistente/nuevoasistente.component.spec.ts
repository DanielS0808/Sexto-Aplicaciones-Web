import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NuevoasistenteComponent } from './nuevoasistente.component';

describe('NuevoasistenteComponent', () => {
  let component: NuevoasistenteComponent;
  let fixture: ComponentFixture<NuevoasistenteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NuevoasistenteComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NuevoasistenteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
